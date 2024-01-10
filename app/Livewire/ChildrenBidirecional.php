<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class ChildrenBidirecional extends Component
{

    //  #[Modelable] => crea la relacion mediante la variable compartida "$atributoDeClaseCompartidaBidireccional" entre  componente Children y Father
    // resultado: una comunicacion en ambos sentidos ( <===> )

    #[Modelable]
    public $atributoDeClaseCompartidaBidireccional;

    public function render()
    {
        return view('livewire.children-bidirecional');
    }
}
