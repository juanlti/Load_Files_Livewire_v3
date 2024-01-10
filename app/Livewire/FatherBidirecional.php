<?php

namespace App\Livewire;

use Livewire\Component;

class FatherBidirecional extends Component
{

    public $atributoDeClaseCompartidaBidireccional = "Hola2";

    public function render()
    {
        return view('livewire.father-bidirecional');
    }
}
