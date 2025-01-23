<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EspecializacionFamilia extends Component
{
    public $nombreMostrar;
    public $nombreFamilia;
    public $personaje;

    /**
     * Create a new component instance.
     *
     * @param string $nombreMostrar
     * @param string $nombreFamilia
     */
    public function __construct($nombreMostrar, $nombreFamilia, $personaje)
    {
        $this->nombreMostrar = $nombreMostrar;
        $this->nombreFamilia = $nombreFamilia;
        $this->personaje = $personaje;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.especializacion-familia');
    }
}
