<?php

namespace App\View\Components;

use Illuminate\View\Component;

class boton extends Component
{
    public $color1;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color1='blue')
    {
        $this->color1=$color1;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.boton');
    }
}
