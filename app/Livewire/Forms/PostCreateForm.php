<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Form;


class PostCreateForm extends Form{


    #[Rule('required|min:3|max:5')]
    public $title;
    #[Rule('required')]
    public $content;
    #[Rule('required|exists:categories,id')]
    public $category_id='';
    #[Rule('required|array')]
    public $tags=[];



    public $imageKey;
    #[Rule('nullable|image|max:1024')]
    public $image;
    //atributo de la imagen, memoria temporal
    public function save(){
        //veririca las reglas de los atributos
        $this->validate();

        $post=Post::create($this->only('title','content','category_id'));
        $post->tags()->attach($this->tags);
        // attach()  METODO QUE ASIGNA VALORES A UNA TABLA PIVOTE

        //una vez creado y enlazado, limpiamos los inputs
        //actualizar la lista de Post con la accion de crear un nuevo Post



        // Ante ultimo paso
        //verifimo que tengamos una imagen
        if($this->image){
            //proceso la imagen
        $fileImage=$this->image->store('post'); //se guarda en el directorio 'post'
        $post->image_path=$fileImage; // y lo asigno la ruta en la bd
            $post->save(); // guardamos en la bd
        }




        //$this->postCreateForm->reset(['title','content','category_id','tags']);
        // alternativa
        $this->reset();
        $this->imageKey=rand();
        //la forma de resetar el input de file, es asignale un valor diferente al que obtuvo con el archivo,
        // de esa manera, se resete el input

    }

}
