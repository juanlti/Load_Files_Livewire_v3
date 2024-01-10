<?php

namespace App\Livewire;

use Livewire\Component;

class Father extends Component
{

    public $atributoDeClaseCompartida="Hola";
    public $atributoDeClaseCompartidaBidireccional="Adios";

    public function render()
    {
        return view('livewire.father');
    }
}
