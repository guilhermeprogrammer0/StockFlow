<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    public function index():View{
        return view('login');
    }
    public function login_submit(Request $request)
    {
        $request->validate(
        [

        ]);
    }
}
