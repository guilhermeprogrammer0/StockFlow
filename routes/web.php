<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('/',[ProductsController::class,'escolha_categoria'])->name('escolha_categoria');
    Route::post('/categoria',[ProductsController::class,'envio_categoria'])->name('categoria');
    Route::get('/cadastro',[MainController::class,'cadastrar'])->name('cadastro');
    Route::post('/cadastro_usuario',[MainController::class,'cadastro_usuario'])->name('cadastro_usuario');
    Route::get('/lista_usuarios',[MainController::class,'lista_usuarios'])->name('lista_usuarios');
    Route::get('/editar_usuarios/{id}',[MainController::class,'editar_usuario'])->name('editar_usuario');
    Route::post('/editar_usuario_submit',[MainController::class,'editar_usuario_submit'])->name('editar_usuario_submit');
    Route::get('/excluir_usuarios/{id}',[MainController::class,'excluir_usuario'])->name('excluir_usuario');
    Route::get('/excluir_usuario_confirma/{id}',[MainController::class,'excluir_usuario_confirma'])->name('excluir_usuario_confirma');
    Route::get('/perfil_comum',[MainController::class,'perfil_comum'])->name('perfil_comum');
    Route::get('/cadastro_produtos',[ProductsController::class,'cadastro_produtos'])->name('cadastro_produtos');
    Route::post('/cadastro_produtos_submit',[ProductsController::class,'cadastro_produtos_submit'])->name('cadastro_produtos_submit');
    Route::get('/editar_produto/{id}',[ProductsController::class,'editar_produto'])->name('editar_produto');
    Route::post('/atualizar_produto',[ProductsController::class,'atualizar_produto'])->name('atualizar_produto');
    Route::get('/excluir_produto/{id}',[ProductsController::class,'excluir_produto'])->name('excluir_produto');
    Route::get('/excluir_produto_confirma/{id}',[ProductsController::class,'excluir_produto_confirma'])->name('excluir_produto_confirma');
    Route::get('/mudar_estoque/{id}',[ProductsController::class,'mudar_estoque'])->name('mudar_estoque');
    Route::post('/mudar_estoque_submit',[ProductsController::class,'mudar_estoque_submit'])->name('mudar_estoque_submit');
    Route::get('/movimentacoes',[ProductsController::class,'movimentacoes'])->name('movimentacoes');
    Route::get('/cadastro_categorias',[ProductsController::class,'cadastro_categorias'])->name('cadastro_categorias');
    Route::post('/cadastro_categorias_submit',[ProductsController::class,'cadastro_categorias_submit'])->name('cadastro_categorias_submit');
    Route::get('/excluir_categoria/{id}',[ProductsController::class,'excluir_categoria'])->name('excluir_categoria');
    Route::get('/excluir_categoria_confirma/{id}',[ProductsController::class,'excluir_categoria_confirma'])->name('excluir_categoria_confirma');
    Route::get('/lista_produtos',[ProductsController::class,'lista_produtos'])->name('lista_produtos');
});


Route::middleware('guest')->group(function(){
    Route::get('/confirmacao_usuario/{token}',[MainController::class,'confirmacaoUsuario'])->name('confirmacao_usuario');
    Route::post('/novo_usuario_senha',[MainController::class,'novoUsuarioSenha'])->name('novo_usuario_senha');
    Route::get('/boas-vindas',[MainController::class,'boasVindas'])->name('boas-vindas');
});



