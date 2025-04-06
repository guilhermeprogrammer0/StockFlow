<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MainController extends Controller
{
    public function cadastrar(){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        return view('auth.cadastro');
    }
    public function cadastro_usuario(Request $request){
       $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'role' => ['required','in:administrador,comum'],
                'email' => ['required','string','email','max:255','unique:users,email'],
                'password' => ['required','string','min:6','confirmed'],
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
            'email.unique' => 'o email informado já está em uso',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha tem que ter no mínimo :min caracteres',
            'password.confirmed' => 'A senha e confirmação de senha devem ser iguais',
            'password_confirmation.required' => 'A confirmação de senha é obrigatória',
            'password_confirmation.same' => 'A confirmação de senha deve ser igual a senha'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }
    
}
