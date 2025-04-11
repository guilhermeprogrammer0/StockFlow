<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class MainController extends Controller
{
    public function cadastrar(){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        return view('auth.cadastro');
    }
    public function cadastro_usuario(Request $request){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
       $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'role' => ['required','in:administrador,comum'],
                'email' => ['required','string','email','max:255','unique:users,email'],
                'password' => ['required','string','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
                'password_confirmation' => ['required','same:password'],  
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
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha tem que ter no mínimo :min caracteres',
            'password.regex' => 'Pelo menos uma letra maiúscula, uma minúscula e uma letra',
            'password_confirmation.required' => 'A confirmação de senha é obrigatória',
            'password_confirmation.same' => 'A confirmação de senha deve ser igual a senha'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('lista_usuarios');
    }
    public function lista_usuarios(){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $users = User::all();
        return view('auth.lista_usuarios',['usuarios'=>$users]);
    }
    public function editar_usuario($id){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        return view('auth.editar_usuario',['usuario'=>$user]);
    }
    public function editar_usuario_submit (Request $request){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
       $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'role' => ['required','in:administrador,comum'],
                'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($request->id)],
                'password' => ['required','string','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
                'password_confirmation' => ['required','same:password'],  
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
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha tem que ter no mínimo :min caracteres',
            'password.regex' => 'Pelo menos uma letra maiúscula, uma minúscula e uma letra',
            'password_confirmation.required' => 'A confirmação de senha é obrigatória',
            'password_confirmation.same' => 'A confirmação de senha deve ser igual a senha'
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('lista_usuarios');
    }
    public function excluir_usuario($id){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        return view('auth.exclusao_confirmacao',['usuario'=>$user]);
    }
    public function excluir_usuario_confirma($id){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('lista_usuarios');
    }
    
    
}
