<?php

namespace App\Livewire;
use App\Models\Product;
use Livewire\Component;

class BuscaProdutos extends Component
{
    public $busca = '';
    public function mount()
    {
        if (!session()->has('categoria')) {
            return redirect()->route('escolha_categoria');
        }
    }
    public function render()
    {
        $categoria = session('categoria');
        if($this->busca !== ''){
            $produtos = Product::where('categoria_id',$categoria)->where('nome','like','%'. $this->busca . '%')->orWhere('codigo', 'like', '%' . $this->busca . '%')->get();
            }
            else{
                $produtos = Product::where('categoria_id', $categoria)->get();
            }
        return view('livewire.busca-produtos',compact('produtos'));
    }
}
