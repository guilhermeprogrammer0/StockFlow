<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Movimentacao;

class FormTipoMovimentacao extends Component
{
    public $tipo = '' ;
    public function render()
    {
        if($this->tipo !== ''){
        $movimentacoes = Movimentacao::with('produto','cliente')->where('tipo', $this->tipo)->get();
        }
        else{
            $movimentacoes = Movimentacao::with('produto','cliente')->get();
        }
        return view('livewire.form-tipo-movimentacao',compact('movimentacoes'));
    }
}
