<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainLayout extends Component
{
    public string $titulo;
    public string $color;
    public function __construct(string $titulo, string $color)
    {
        $this->titulo = $titulo;
        $this->color = $color;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main-layout');
    }
}
