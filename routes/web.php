<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('/',[ProductsController::class,'escolha_categoria'])->name('escolha_categoria');
    Route::post('/categoria',[ProductsController::class,'envio_categoria'])->name('categoria');
    Route::get('/cadastro',[MainController::class,'cadastrar'])->name('cadastro');
    Route::post('/cadastro_usuario',[MainController::class,'cadastro_usuario'])->name('cadastro_usuario');
});



