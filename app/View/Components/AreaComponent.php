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
    public function __construct(string $tipoAlinhamento)
    {
        $this->tipoAlinhamento = $tipoAlinhamento;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.area-component');
    }
}
