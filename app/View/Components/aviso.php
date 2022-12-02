<?php

namespace App\View\Components;

use Illuminate\View\Component;

class aviso extends Component
{
    public $coloraviso;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($coloraviso="green")
    {
        $this->coloraviso=$coloraviso;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.aviso');
    }
    public function prueba(){
        return 'mensaje desde metodo';
    }
}
