<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('/',[ProductsController::class,'escolha_categoria'])->name('escolha_categoria');
    Route::post('/categoria',[ProductsController::class,'envio_categoria'])->name('categoria');
    Route::get('/cadastro',[MainController::class,'cadastrar'])->name('cadastro');
    Route::post('/cadastro_usuario',[MainController::class,'cadastro_usuario'])->name('cadastro_usuario');
    Route::get('/cadastro_produtos',[ProductsController::class,'cadastro_produtos'])->name('cadastro_produtos');
    Route::post('/cadastro_produtos_submit',[ProductsController::class,'cadastro_produtos_submit'])->name('cadastro_produtos_submit');
    Route::get('/cadastro_categorias',[ProductsController::class,'cadastro_categorias'])->name('cadastro_categorias');
    Route::post('/cadastro_categorias_submit',[ProductsController::class,'cadastro_categorias_submit'])->name('cadastro_categorias_submit');
    
    //Route::get('/lista_produtos',[ProductsController::class,'lista_produtos'])->name('lista_produtos');


});



