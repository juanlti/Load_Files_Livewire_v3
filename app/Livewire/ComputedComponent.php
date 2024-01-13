<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Computed;

class ComputedComponent extends Component
{
    // Propiedades computadas vs  Fuciones
    // Prop. Computaddas -> almacena el resultado de la instancia en memoria chache para ser reutilizable
    // Funcion, el metodo, se va a ejecutar por la cantidad de peticiones siendo del mismo objeto. NO RECOMENDADO

    //Por cada modificacion de la variable $post_id
    // se ejecuta la funcion #[Computed]
    public $post_id;


    //LA FUNCION POST()  TOMA EL COMPORTAMIENTO DE UNA PROPIEDADES COMPUTADA!
    //Toda propiedad computada, va cambiando su valor en funcion a otro valor!

    #[Computed]
    public function post()
    {

        //el metodo post(), recibe desde el front, el valor de un id a buscar en la db
        $post=Post::find($this->post_id);


        return $post;

    }


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.computed');
    }
}
