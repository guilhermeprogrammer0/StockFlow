<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Http\Request;

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
                $produtos = Product::where('categoria_id',$request->categoria)->get();
                return view('lista_produtos',['produtos'=>$produtos]);

    }

}
