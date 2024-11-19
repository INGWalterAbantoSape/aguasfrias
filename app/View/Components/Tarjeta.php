<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tarjeta extends Component
{
    /**
     * Create a new component instance.
     */
    public $cantidad;
    public $titulo;
    public $items;
    public $link;
    public function __construct($cantidad = 0, $titulo = 'Title', $items = [], $link = '#')
    {
        $this->cantidad = $cantidad;
        $this->titulo = $titulo;
        $this->items = $items;
        $this->link = $link;
    }

    public function render()
    {
        return view('components.tarjeta');
    }
}
