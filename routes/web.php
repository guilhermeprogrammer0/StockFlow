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
    Route::get('/cadastro_fornecedores',[MainController::class,'cadastro_fornecedores'])->name('cadastro_fornecedores');
    Route::post('/cadastro_fornecedores_submit',[MainController::class,'cadastro_fornecedores_submit'])->name('cadastro_fornecedores_submit');
    Route::get('/lista_fornecedores',[MainController::class,'lista_fornecedores'])->name('lista_fornecedores');
    Route::get('/editar_fornecedor/{id}',[MainController::class,'editar_fornecedor'])->name('editar_fornecedor');
    Route::get('/excluir_fornecedor/{id}',[MainController::class,'excluir_fornecedor'])->name('excluir_fornecedor');
    Route::get('/excluir_fornecedor_confirma/{id}',[MainController::class,'excluir_fornecedor_confirma'])->name('excluir_fornecedor_confirma');
    Route::post('/editar_fornecedor_submit',[MainController::class,'editar_fornecedor_submit'])->name('editar_fornecedor_submit');
    Route::get('/cadastro_clientes',[MainController::class,'cadastro_clientes'])->name('cadastro_clientes');
    Route::post('/cadastro_clientes_submit',[MainController::class,'cadastro_clientes_submit'])->name('cadastro_clientes_submit');
    Route::get('/lista_clientes',[MainController::class,'lista_clientes'])->name('lista_clientes');
    Route::get('/editar_cliente/{id}',[MainController::class,'editar_cliente'])->name('editar_cliente');
    Route::post('/editar_cliente_submit',[MainController::class,'editar_cliente_submit'])->name('editar_cliente_submit');
    Route::get('/excluir_cliente/{id}',[MainController::class,'excluir_cliente'])->name('excluir_cliente');
    Route::get('/excluir_cliente_confirma/{id}',[MainController::class,'excluir_cliente_confirma'])->name('excluir_cliente_confirma');
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



