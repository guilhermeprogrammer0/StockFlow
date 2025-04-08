<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Http\Request;
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
            'descricao' => 'required|min:5|max:100',
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
    public function lista_produtos(){
        if(!session()->has('categoria')){
            return redirect()->route('escolha_categoria');
        }
        $categoria = session('categoria');
        $produtos = Product::where('categoria_id',$categoria)->get();
        return view('lista_produtos',['produtos'=>$produtos]);
    }

}
