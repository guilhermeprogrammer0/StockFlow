<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmacaoContaUsuario;
use App\Models\Fornecedor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function cadastrar()
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        return view('auth.cadastro');
    }
    public function cadastro_usuario(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'role' => ['required', 'in:administrador,comum'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            ],
            [
                'name.required' => 'O nome é obrigatório',
                'name.string' => 'O campo nome tem que ser um texto',
                'name.max' => 'O campo nome não pode ter mais que :max caracteres',
                'role.required' => 'Campo de perfil é obrigatório',
                'role.in' => 'Somente valores válidos',
                'email.required' => 'O email é obrigatório',
                'email.email' => 'O email deve ser válido',
                'email.unique' => 'o email informado está indisponível',
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->token = Str::random(69);
        $url = route('confirmacao_usuario', ['token' => $user->token]);
        Mail::to($user->email)->send(new ConfirmacaoContaUsuario($url, $user->name));
        if ($user->save()) {
            return redirect()->back()->with('sucesso', 'Usuário cadastrado com sucesso!');
        } else {
            return redirect()->back()->with(['erro' => 'Erro ao cadastrar o usuário']);
        }
    }
    public function confirmacaoUsuario($token)
    {
        $user = User::where('token', $token)->first();
        if (!$user) {
            abort(404, 'Token inválido ou expirado');
        }
        return view('auth.novo_usuario', compact('token'));
    }
    public function novoUsuarioSenha(Request $request)
    {
        $request->validate(
            [
                'token' => 'required|size:69',
                'password' => ['required', 'string', 'min:6', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
                'password_confirmation' => ['required', 'same:password'],
            ],
            [
                'password.required' => 'A senha é obrigatória',
                'password.min' => 'A senha tem que ter no mínimo :min caracteres',
                'password.regex' => 'Pelo menos uma letra maiúscula, uma minúscula e um número',
                'password_confirmation.required' => 'A confirmação de senha é obrigatória',
                'password_confirmation.same' => 'A confirmação de senha deve ser igual à senha',
            ]
        );
        $user = User::where('token', $request->token)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['token' => 'Token inválido ou expirado']);
        }
        $user->email_verified_at = Carbon::now();
        $user->token = null;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('boas-vindas');
    }
    public function boasVindas()
    {
        return view('auth.boas-vindas');
    }
    public function lista_usuarios()
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $users = User::paginate(5);
        return view('auth.lista_usuarios', ['usuarios' => $users]);
    }
    public function editar_usuario($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        return view('auth.editar_usuario', ['usuario' => $user]);
    }
    public function editar_usuario_submit(Request $request)
    {
        $regras = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)]
        ];

        if (Auth::user()->id === intval($request->id)) {
            $regras['password'] = ['required', 'string', 'min:6', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'];
            $regras['password_confirmation'] = ['required', 'same:password'];
        }
        if (Auth::user()->role === 'administrador') {
            $regras['role'] = ['required', 'in:administrador,comum'];
        }
        $request->validate(
            $regras,
            [
                'name.required' => 'O nome é obrigatório',
                'name.string' => 'O campo nome tem que ser um texto',
                'name.max' => 'O campo nome não pode ter mais que :max caracteres',
                'role.required' => 'Campo de perfil é obrigatório',
                'role.in' => 'Somente valores válidos',
                'email.required' => 'O email é obrigatório',
                'email.email' => 'O email deve ser válido',
                'email.unique' => 'o email informado está indisponível',
                'password.required' => 'A senha é obrigatória',
                'password.min' => 'A senha tem que ter no mínimo :min caracteres',
                'password.regex' => 'Pelo menos uma letra maiúscula, uma minúscula e um número',
                'password_confirmation.required' => 'A confirmação de senha é obrigatória',
                'password_confirmation.same' => 'A confirmação de senha deve ser igual à senha',
            ]
        );
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (Auth::user()->id ===  intval($request->id)) {
            $user->password = bcrypt($request->password);
        }
        if (Auth::user()->role === 'administrador') {
            $user->role = $request->role;
        }
        $user->save();
        if (Auth::user()->role === 'administrador') {
            return redirect()->route('lista_usuarios');
        } else if (Auth::user()->role === 'comum') {
            return redirect()->route('perfil_comum');
        }
    }
    public function excluir_usuario($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        return view('auth.exclusao_confirmacao', ['usuario' => $user]);
    }
    public function excluir_usuario_confirma($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        if (Auth::user()->role === 'administrador') {
            $user->delete();
            return redirect()->route('lista_usuarios');
        } else if (Auth::user()->role === 'comum') {
            $user->delete();
            return redirect()->route('login');
        }
    }
    public function perfil_comum()
    {
        if (Gate::denies('comum')) {
            abort(404, 'Página não encontrada');
        }
        return view('auth.perfil_comum');
    }
    public function cadastro_fornecedores()
    {
        return view('cadastro-fornecedores');
    }
    public function cadastro_fornecedores_submit(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
                'nome' => ['required', 'string', 'max:100'],
                'cnpj' => ['required', 'min:14', 'max:14','unique:fornecedores,cnpj'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:fornecedores,email'],
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.string' => 'O campo nome tem que ser um texto',
                'nome.max' => 'O campo nome não pode ter mais que :max caracteres',
                'cnpj.required' => 'O campo CNPJ é obrigatório',
                'cnpj.min' => 'O campo CNPJ deve ter no mínimo :min caracteres',
                'cnpj.max' => 'O campo CNPJ deve ter no máximo :max caracteres',
                'cnpj.unique' => 'CNPJ indisponível',
                'email.required' => 'O email é obrigatório',
                'email.email' => 'O email deve ser válido',
                'email.unique' => 'o email informado está indisponível',
            ]
        );
        $fornecedor = new Fornecedor();
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->email = $request->email;
        if ($fornecedor->save()) {
            return redirect()->back()->with('sucesso', 'Fornecedor cadastrado com sucesso!');
        } else {
            return redirect()->back()->with(['erro' => 'Erro ao cadastrar o fornecedor']);
        }
    }
    public function lista_fornecedores()
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $fornecedores = Fornecedor::all();
        return view('lista-fornecedores', compact('fornecedores'));
    }
    public function editar_fornecedor($id)
    {
        $id = Crypt::decrypt($id);
        $fornecedor = Fornecedor::find($id);
        return view('editar-fornecedor', compact('fornecedor'));
    }
    public function editar_fornecedor_submit(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
                'nome' => ['required', 'string', 'max:100'],
                'cnpj' => ['required', 'min:14', 'max:14',Rule::unique('fornecedores')->ignore($request->id)],
                'email' => ['required', 'string', 'email', 'max:255',Rule::unique('fornecedores')->ignore($request->id)],
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.string' => 'O campo nome tem que ser um texto',
                'nome.max' => 'O campo nome não pode ter mais que :max caracteres',
                'cnpj.required' => 'O campo CNPJ é obrigatório',
                'cnpj.min' => 'O campo CNPJ deve ter no mínimo :min caracteres',
                'cnpj.max' => 'O campo CNPJ deve ter no máximo :max caracteres',
                'email.required' => 'O email é obrigatório',
                'email.email' => 'O email deve ser válido',
                'email.unique' => 'o email informado está indisponível',
            ]
        );
       
        $fornecedor = Fornecedor::find($request->id);
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->email = $request->email;
        $fornecedor->save();
        return redirect()->route('lista_fornecedores');
    }
    public function excluir_fornecedor($id){
        $id = Crypt::decrypt($id);
        $fornecedor = Fornecedor::find($id);
        return view('exclusao-confirma-fornecedor', compact('fornecedor'));
    }
    public function excluir_fornecedor_confirma($id){
        $id = Crypt::decrypt($id);
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();
        return redirect()->route('lista_fornecedores');
    }
}
