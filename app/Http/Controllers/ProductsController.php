<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Movimentacao;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function escolha_categoria()
    {
        $categorias = Categoria::all();
        return view('escolha_categoria', ['categorias' => $categorias]);
    }
    public function envio_categoria(Request $request)
    {
        $request->validate(
            [
                'categoria' => 'required|exists:categorias,id'
            ],
            [
                'categoria.required' => 'O campo categoria é obrigatório',
                'categoria.exists' => 'Somente valores válidos'
            ]
        );
        session(['categoria' => $request->categoria]);
        return redirect()->route('lista_produtos');
    }
    public function cadastro_produtos()
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $categorias = Categoria::all();
        return view('cadastro-produtos', ['categorias' => $categorias]);
    }
    public function cadastro_produtos_submit(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
                'codigo' => ['required', 'min:3', 'max:50', 'unique:products,codigo'],
                'nome' => ['required', 'min:3', 'max:50'],
                'preco' => ['required', 'numeric'],
                'categoria' => ['required', 'exists:categorias,id'],
            ],
            [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'No mínimo :min caracteres',
                'nome.max' => 'No máximo :max caracteres',
                'codigo.required' => 'O campo codigo é obrigatório',
                'codigo.min' => 'No mínimo :min caracteres',
                'codigo.max' => 'No máximo :max caracteres',
                'preco.required' => 'O campo preço é obrigatório',
                'preco.numeric' => 'Precisar ser um valor válido',
                'categoria.required' => 'O campo categoria é obrigatório',
                'categoria.exists' => 'Somente valores válidos',
            ]
        );
        $produto = new Product();
        $produto->codigo = $request->codigo;
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria;
        if ($produto->save()) {
            return redirect()->back()->with('sucesso', 'Produto cadastrado com sucesso!');
        } else {
            return redirect()->back()->with(['erro' => 'Erro ao cadastrar o produto']);
        }
    }
    public function editar_produto($id)
    {
        $id = Crypt::decrypt($id);
        $produto = Product::find($id);
        $categorias = Categoria::all();
        return view('editar_produto', compact('produto', 'categorias'));
    }
    public function atualizar_produto(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
                'codigo' => ['required', 'min:3', 'max:50', Rule::unique('products', 'codigo')->ignore($request->id)],
                'nome' => ['required', 'min:3', 'max:50'],
                'preco' => ['required', 'numeric'],
                'categoria' => ['required', 'exists:categorias,id'],
            ],
            [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'No mínimo :min caracteres',
                'nome.max' => 'No máximo :max caracteres',
                'codigo.required' => 'O campo codigo é obrigatório',
                'codigo.min' => 'No mínimo :min caracteres',
                'codigo.max' => 'No máximo :max caracteres',
                'preco.required' => 'O campo preço é obrigatório',
                'preco.numeric' => 'Precisar ser um valor válido',
                'categoria.required' => 'O campo categoria é obrigatório',
                'categoria.exists' => 'Precisa ser um valor válido',
            ]
        );
        $produto = Product::find($request->id);
        $atualizado = $produto->update([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'preco' => $request->preco,
            'categoria_id' => $request->categoria,
        ]);
        if ($atualizado) {
            return redirect()->back()->with('sucesso', 'Produto editado com sucesso!');
        } else {
            return redirect()->back()->with(['erro' => 'Erro ao editar o produto']);
        }
        session(['categoria' => $request->categoria]);
    }
    public function excluir_produto($id)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $produto = Product::find($id);
        return view('excluir_produto_confirmacao', compact('produto'));
    }
    public function excluir_produto_confirma($id)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $produto = Product::find($id);
        $produto->delete();
        return redirect()->route('lista_produtos');
    }
    public function mudar_estoque($id)
    {
        $id = Crypt::decrypt($id);
        $produto = Product::find($id);
        $fornecedores = Fornecedor::all();
        return view('mudar_estoque', compact('produto', 'fornecedores'));
    }
    public function mudar_estoque_submit(Request $request)
    {
        $regras = [
            'quantidade' => ['required', 'integer'],
            'tipo' => ['required', 'in:entrada,saida'],
        ];
        if ($request->tipo === 'entrada') {
            $regras['fornecedor'] = ['required', 'exists:fornecedores,id'];
        }
        $request->validate($regras, [
            'quantidade.required' => 'O campo quantidade é obrigatório',
            'quantidade.integer' => 'O campo quantidade precisa ser um número válido',
            'tipo.required' => 'O campo tipo é obrigatório',
            'tipo.in' => 'Somente valores válidos',
            'fornecedor.required' => 'O campo fornecedores é obrigatório',
            'fornecedor.exists' => 'Somente valores válidos'
        ]);
        $produto = Product::find($request->product_id);
        if ($request->tipo === 'entrada') {
            $produto->quantidade += $request->quantidade;
        } else if ($request->tipo === 'saida' && $request->quantidade >  $produto->quantidade) {
            return redirect()->back()->with('erro', 'Quantidade insuficiente');
        } else {
            $produto->quantidade -= $request->quantidade;
        }
        $produto->save();
        $movimentacao = new Movimentacao();
        $movimentacao->tipo = $request->tipo;
        $movimentacao->quantidade = $request->quantidade;
        $movimentacao->data = Carbon::now();
        $movimentacao->product_id = $request->product_id;
        if ($request->tipo === 'entrada') {
            $movimentacao->fornecedor_id = $request->fornecedor;
        }
        if ($movimentacao->save()) {
            return redirect()->back()->with('sucesso', 'Movimentação realizada com sucesso!');
        } else {
            return redirect()->back()->with(['erro' => 'Erro ao cadastrar ao fazer a operação']);
        }
    }
    public function movimentacoes()
    {
        $movimentacoes = Movimentacao::with('produto')->get();
        return view('movimentacoes', compact('movimentacoes'));
    }
    public function lista_produtos()
    {
        if (!session()->has('categoria')) {
            return redirect()->route('escolha_categoria');
        }
        $categoria = session('categoria');
        $produtos = Product::where('categoria_id', $categoria)->get();
        return view('lista_produtos', ['produtos' => $produtos]);
    }
    public function cadastro_categorias()
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $categorias = Categoria::all();
        return view('cadastro-categorias', ['categorias' => $categorias]);
    }
    public function cadastro_categorias_submit(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
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
            ]
        );
        $categoria = new Categoria();
        $categoria->nome = $request->nome;
        $categoria->save();
        return redirect()->back();
    }
    public function excluir_categoria($id)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $categoria = Categoria::find($id);
        return view('excluir_categoria_confirmacao', compact('categoria'));
    }
    public function excluir_categoria_confirma($id)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $id = Crypt::decrypt($id);
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('cadastro_categorias');
    }
}
