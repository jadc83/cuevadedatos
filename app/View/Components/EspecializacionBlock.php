<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EspecializacionBlock extends Component
{
    public $familia;
    public $especializaciones;

    public function __construct($familia, $especializaciones)
    {
        $this->familia = $familia;
        $this->especializaciones = $especializaciones;
    }

    public function render()
    {
        return view('components.especializacion-block');
    }
}
