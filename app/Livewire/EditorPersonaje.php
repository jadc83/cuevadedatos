<?php

namespace App\Livewire;

use App\Models\Personaje;
use Livewire\Component;

class EditorPersonaje extends Component
{
    public $principal = "ahola";

    public function render()
    {
        $personajes = Personaje::all();
        return view('livewire.editor-personaje', ['personajes' => $personajes]);
    }
}
