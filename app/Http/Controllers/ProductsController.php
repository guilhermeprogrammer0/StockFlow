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
                'categoria' => 'required|not_in:selecione'
            ],
            [
                'categoria.required' => 'O campo categoria é obrigatório',
                'categoria.not_in' => 'Somente valores válidos'
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
        $fornecedores = Fornecedor::all();
        return view('cadastro-produtos', ['categorias' => $categorias,'fornecedores'=>$fornecedores]);
    }
    public function cadastro_produtos_submit(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
                'codigo' => ['required', 'min:3', 'max:50', 'unique:products,codigo'],
                'nome' => ['required', 'min:5', 'max:50'],
                'preco' => ['required', 'numeric'],
                'quantidade' => ['required', 'integer'],
                'categoria' => ['required', 'exists:categorias,id'],
                'fornecedor' => ['required', 'exists:fornecedores,id'],
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
                'quantidade.required' => 'O campo quantidade é obrigatório',
                'quantidade.integer' => 'O campo quantidade precisa ser um número',
                'categoria.required' => 'O campo categoria é obrigatório',
                'categoria.exists' => 'Precisa ser um valor válido',
                'fornecedor.required' => 'O campo fornecedor é obrigatório',
                'fornecedor.exists' => 'Precisa ser um valor válido'

            ]
        );
        $produto = new Product();
        $produto->codigo = $request->codigo;
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;
        $produto->categoria_id = $request->categoria;
        $produto->fornecedor_id = $request->fornecedor;
        $produto->save();

        return redirect()->route('escolha_categoria');
    }
    public function editar_produto($id)
    {
        $id = Crypt::decrypt($id);
        $produto = Product::find($id);
        $categorias = Categoria::all();
        $fornecedores = Fornecedor::all();
        return view('editar_produto', compact('produto', 'categorias','fornecedores'));
    }
    public function atualizar_produto(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403, 'Você não tem permissão para acessar esse recurso');
        }
        $request->validate(
            [
                'codigo' => ['required', 'min:3', 'max:50', Rule::unique('products', 'codigo')->ignore($request->id)],
                'nome' => ['required', 'min:5', 'max:50'],
                'preco' => ['required', 'numeric'],
                'categoria' => ['required', 'exists:categorias,id'],
                'fornecedor' => ['required', 'exists:fornecedores,id'],
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
                'fornecedor.required' => 'O campo fornecedor é obrigatório',
                'fornecedor.exists' => 'Precisa ser um valor válido'
            ]
        );
       
        $produto = Product::find($request->id);
        $produto->update([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'preco' => $request->preco,
            'categoria_id' => $request->categoria,
            'fornecedor_id' => $request->fornecedor
        ]);
       session(['categoria' => $request->categoria]);
        return redirect()->route('lista_produtos');
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
        return view('mudar_estoque', compact('produto'));
    }
    public function mudar_estoque_submit(Request $request)
    {
        $request->validate([
            'quantidade' => 'required|integer',
            'tipo' => 'required|in:entrada,saida'
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
        Movimentacao::create([
            'tipo' => $request->tipo,
            'quantidade' => $request->quantidade,
            'data'=> Carbon::now(),
            'product_id' => $request->product_id
        ]);
        return redirect()->route('lista_produtos');
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
