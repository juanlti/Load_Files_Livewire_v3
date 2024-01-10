<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class Children extends Component
{

   // public $prueba='hola';
    #[Reactive]
    public $atributoDeClaseCompartida="Hola1";
    /*
    #[Reactive]
    public $atributoDeClaseCompartida;
 // #[Reactive] => crea una relacion de recepcion ! es decir ,recibe los mensajes del Father
    */



    public function render()
    {
        return view('livewire.children');
    }
}
