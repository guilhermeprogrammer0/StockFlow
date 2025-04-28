<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Movimentacao;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function escolha_categoria(){
        $categorias = Categoria::all();
        return view('escolha_categoria',['categorias'=>$categorias]);
    }
    public function envio_categoria(Request $request){
        $request->validate(
                [
                'categoria' => 'required|not_in:selecione'  
                ],
                [
                    'categoria.required' => 'O campo categoria é obrigatório',
                    'categoria.not_in' => 'Somente valores válidos'
                ]);
                session(['categoria'=>$request->categoria]);
                return redirect()->route('lista_produtos');
    }
    public function cadastro_produtos(){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $categorias = Categoria::all();
        return view('cadastro-produtos',['categorias'=>$categorias]);
    }
    public function cadastro_produtos_submit(Request $request){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
            'nome' => 'required|min:5|max:50',
            'descricao' => 'required|min:3|max:100',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            ],
            [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'No mínimo :min caracteres',
                'nome.max' => 'No máximo :max caracteres',
                'descricao.required' => 'O campo descrição é obrigatório',
                'descricao.min' => 'No mínimo :min caracteres',
                'descricao.max' => 'No máximo :max caracteres',
                'preco.required' => 'O campo preço é obrigatório',
                'preco.numeric' => 'Precisar ser em real',
                'quantidade.required' => 'O campo quantidade é obrigatório',
                'quantidade.integer' => 'O campo quantidade precisa ser um número'
            ]);
            $produto = new Product();
            $produto->nome = $request->nome;
            $produto->descricao = $request->descricao;
            $produto->preco = $request->preco;
            $produto->quantidade = $request->quantidade;
            $produto->categoria_id = $request->categoria;
            $produto->save();

            return redirect()->route('escolha_categoria');
    }
    public function editar_produto($id){
        $id = Crypt::decrypt($id);
        $produto = Product::find($id);
        $categorias = Categoria::all();
        return view('editar_produto',compact('produto','categorias'));
    }
    public function atualizar_produto(Request $request){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
            'nome' => 'required|min:5|max:50',
            'descricao' => 'required|min:3|max:100',
            'preco' => 'required|numeric',
            ],
            [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'No mínimo :min caracteres',
                'nome.max' => 'No máximo :max caracteres',
                'descricao.required' => 'O campo descrição é obrigatório',
                'descricao.min' => 'No mínimo :min caracteres',
                'descricao.max' => 'No máximo :max caracteres',
                'preco.required' => 'O campo preço é obrigatório',
                'preco.numeric' => 'Precisar ser em real',
            ]);
        $produto = Product::find($request->id);
        $produto->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco'=> $request->preco,
            'categoria_id' => $request->categoria
        ]);
        session(['categoria'=>$request->categoria]);
        return redirect()->route('lista_produtos');
    }
    public function excluir_produto($id){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $produto = Product::find($id);
        return view('excluir_produto_confirmacao',compact('produto'));
    }
    public function excluir_produto_confirma($id){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $produto = Product::find($id);
        $produto->delete();
        return redirect()->route('lista_produtos');
    }
    public function mudar_estoque($id){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $produto = Product::find($id);
        return view('mudar_estoque',compact('produto'));
    }
    public function mudar_estoque_submit(Request $request){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $request->validate([
            'quantidade' => 'required|integer',
            'tipo' => 'required|in:entrada,saida'
        ]);
        $produto = Product::find($request->product_id);
        if($request->tipo === 'entrada'){
            $produto->quantidade += $request->quantidade;
        }
        else if($request->tipo === 'saida' && $request->quantidade >  $produto->quantidade ){
            return redirect()->back()->with('erro','Quantidade insuficiente');
        }
        else{
            $produto->quantidade -= $request->quantidade;
        }
        $produto->save();
        Movimentacao::create([
            'tipo' => $request->tipo,
            'quantidade' => $request->quantidade,
            'product_id' => $request->product_id
        ]);
        return redirect()->route('lista_produtos');
    }
    public function movimentacoes(){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $movimentacoes = Movimentacao::with('produto')->get();
        return view('movimentacoes',compact('movimentacoes'));
    }
    public function lista_produtos(){
        if(!session()->has('categoria')){
            return redirect()->route('escolha_categoria');
        }
        $categoria = session('categoria');
        $produtos = Product::where('categoria_id',$categoria)->get();
        return view('lista_produtos',['produtos'=>$produtos]);
    }
    public function cadastro_categorias(){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $categorias = Categoria::all();
        return view('cadastro-categorias',['categorias'=>$categorias]);
    }
    public function cadastro_categorias_submit(Request $request){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
            'nome' => 'required|min:5|max:50|unique:categorias,nome',
            ],
            [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'No mínimo :min caracteres',
                'nome.max' => 'No máximo :max caracteres',
                'nome.unique' => 'Já existe essa categoria',
            ]);
            $categoria = new Categoria();
            $categoria->nome = $request->nome;
            $categoria->save();
            return redirect()->back();
    }
    public function excluir_categoria($id){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $categoria = Categoria::find($id);
        return view('excluir_categoria_confirmacao',compact('categoria'));
    }
    public function excluir_categoria_confirma($id){
        if(Gate::denies('admin')){
            abort(403,'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('cadastro_categorias');
    }
   

}
