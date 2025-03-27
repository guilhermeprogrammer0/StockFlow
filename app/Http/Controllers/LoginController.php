<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index():View{
        return view('login');
    }
    public function login_submit(Request $request)
    {
        $request->validate(
        [
            'usuario' => 'required|min:5|max:40',
            'senha' => 'required|min:5|max:80'
        ],
        [
            'usuario.required' => 'O campo usuário é obrigatório',
            'usuario.min' => 'No mínimo :min caracteres',
            'usuario.max' => 'No máximo :max caracteres',
            'senha.required' => 'O campo senha é obrigatório',
            'senha.min' => 'No mínimo :min caracteres',
            'senha.max' => 'No máximo :max caracteres',
        ]);

        $usuario = $request->usuario;
        $senha = $request->senha;

        $user = User::where('usuario',$usuario)->first();

        if(!$user || !Hash::check($senha,$user->senha)){
            return redirect()->route('login')->with(['login'=>'Usuário ou senhas inválidos!']);
        }
        else{
            return redirect()->route('produtos');
        }



    }
}
