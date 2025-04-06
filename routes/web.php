<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('produtos');
    });
    Route::get('/cadastro',[MainController::class,'cadastrar'])->name('cadastro');
    Route::post('/cadastro_usuario',[MainController::class,'cadastro_usuario'])->name('cadastro_usuario');

});



