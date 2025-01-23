<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HabilidadButton extends Component
{
    public $habilidadId;
    public $puntuacion;
    public $nombre;

    public function __construct($habilidadId, $puntuacion, $nombre)
    {
        $this->habilidadId = $habilidadId;
        $this->puntuacion = $puntuacion;
        $this->nombre = $nombre;
    }

    public function render()
    {
        return view('components.habilidad-button');
    }
}
