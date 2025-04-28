<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AreaComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public string $tipoAlinhamento;
    public string $tipoAlinhamento2;
    public function __construct($tipoAlinhamento = 'flex-row', $tipoAlinhamento2 = 'items-center')
    {
        $this->tipoAlinhamento = $tipoAlinhamento;
        $this->tipoAlinhamento2 = $tipoAlinhamento2;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.area-component');
    }
}
