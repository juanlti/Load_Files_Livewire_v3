<div>
    {{-- The whole world belongs to you. --}}

    <div class="bg-white shadow rounded-lg p-6 mb-8">

        @if($postCreateForm->image)
            <img src="{{$postCreateForm->image->temporaryUrl()}}" alt="">

        @endif
        <form wire:submit.prevent="save">

            <div class="mb-4">
                {{-- secion  01 del formulario --}}
                {{-- @error('title') <span>{{ $message }}</span> @enderror --}}

                <x-label>
                    Nombre

                    <input type="text" class="w-full rounded-md" wire:model.live="postCreateForm.title">
                </x-label>


                <x-input-error for="postCreateForm.title"/>


            </div>

            <div class="mb-4">
                <x-label>
                    Contenido

                </x-label>

                <x-textarea class="w-full" wire:model="postCreateForm.content">


                </x-textarea>
                <x-input-error for="postCreateForm.content"/>
            </div>
            {{-- secion  02 del formulario --}}
            <div class="mb-4">
                <x-label for="" class="my-3">
                    Imagen

                </x-label>
                {{-- Indicador de progreso de la carga de datos --}}
                <div
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <!-- File Input -->


                    <input type="file" wire:model="postCreateForm.image"
                           wire:key="{{$postCreateForm->imageKey}}"></input>
                    <!-- Progress Bar -->
                    <div x-show="uploading">
                        {{-- Personalziacion--}}
                        <div x-text="progress"></div>
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
            </div>
            <div class="mb-4 ">
                <label for="">
                    Categoria
                    <x-select class="w-full" wire:model.live="postCreateForm.category_id">

                        <option value="" disabled {{ $postCreateForm->category_id ? 'hidden' : '' }} hidden>Selecione
                            una Categoria
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{$category->id}}">
                                {{$category->name}}
                            </option>

                        @endforeach

                    </x-select>
                    <x-input-error for="postCreateForm.category_id"/>
                </label>
            </div>
            <div>
                <ul>
                    @foreach($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox type="checkbox" value="{{$tag->id}}" wire:model="postCreateForm.tags">

                                </x-checkbox>
                                {{$tag['title']}}


                            </label>
                        </li>
                    @endforeach
                        {{-- --}}

                </ul>
                <x-input-error for="postCreateForm.tags"/>
            </div>


            <div class="flex justify-end">
                {{--
              MIENTRAS DURE EL PROCESO DE CARGA, EL BOTON TIENE UNA OPACIDAD,  AL FINALIZAR VUELVE A SU ESTADO ORIGINAL
                <x-button wire:loading.class="opacity-25">
                    {{-- MIENTRAS DURE EL PROCESO DE CARGA, EL BOTON SE QUITA (O DESABILITAR) EL COMPONENTE, AUTOMATICAMENTE SE QUITA AL FINALIZAR
                 {{--   <x-button wire:loading.class.remove="opacity-25">
                            {{-- Este ultmo, es diferente a kis 2 botones anteriores
                        {{-- Queda a la vista pero se essconde al fianlizar la accion,--}}

                {{--  <x-button wire:loading.class.attr="disabled">--}}

                   <x-button class="justify-between" wire:loading.class.delay>
                       {{-- un tiempo extral para el modal de  barra--}}
                                    <div>Guardar</div>


                        </x-button>
                {{--     </x-button> --}}
      {{--  </x-button> --}}
            </div>

        </form>
        <div wire:loading wire:target="save">Procesando...</div>
        {{-- Aparece con la accin del button save --}}
        {{--<div wire:loading wire:target="save">Procesando...</div> --}}
        {{-- Desaparece con la accin del button save --}}
        {{--<div wire:loading.remove wire:target="save">Procesando...</div> --}}

    </div>


    {{--  {{"nombre del formulario".$formularioNombre}}  --}}
    <div class="bg-white shadow rounded-lg p-6 mt-4">
        {{-- BUSCADOR CON RESULTADO AUTOMATICO--}}
        <div class="mb-4">
            <x-input class="w-full" placeholder="Buscar.." wire:model.live="searchPost"/>

        </div>
        {{-- FIN BUSCADOR CON RESULTADO AUTOMATICO--}}

        <ul class="list-disc list-inside space-y-2"> {{--Lista  --}}

            @foreach($posts as $post)
                <li class="flex justify-between" wire:key="post--{{$post->id}}">
                    {{-- CORRECTO FUNCIONAMIENTO DE RENDERIZADO PARA UNA COLECCION QUE VA SE ACTUALIZANDO EN TODO MOMENTO--}}
                    {{-- LOGRAMOS UNA SEPARACION --}}

                    {{$post->title}}
                    {{--  {{$post->title}} izquierda --}}

                    <div>
                        {{-- bottones a la derecha --}}
                        <x-button wire:click="edit({{$post->id}})">
                            Editar
                        </x-button>


                        <x-danger-button wire:click="destroy({{$post->id}})"
                                         wire:confirm="Esta seguro que desea eliminar esta publicacion ?">
                            Eliminar
                        </x-danger-button>
                    </div>

                </li>

            @endforeach


        </ul>
            <div class="mt-4">
                {{-- PAGINACION POR DEFECTO--}}
                    {{$posts->links()}}
                {{-- OTRA  PAGINACION, INDICAMOS LA RUTA--}}
               {{-- {{$posts->links('vendor.livewire.simple-tailwind')}} --}}


            </div>
    </div>


    {{-- MODAL PROPIO (:--}}
    {{-- OCULTAMOS MODAL--}}
    @if($postEditForm->openModal)

        {{-- formulario de edicion--}}
        <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
            <div class="py-12">
                {{-- CENTRAMOS EL CONTENIDO --}}
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    {{--  contenido centrodo ==>   holaaa  --}}
                    <div class="bg-white shadow rounded-lg p-6">

                        <form wire:submit.prevent="update">


                            <div class="mb-4">
                                {{-- secion  01 del formulario --}}
                                @error('title') <span>{{ $message }}</span> @enderror
                                <label>
                                    Nombre
                                </label>
                                <input type="text" class="w-full" wire:model="postEditForm.title">
                                <x-input-error for="postEditForm.title"></x-input-error>
                            </div>

                            <div class="mb-4">
                                <x-label>
                                    Contenido

                                </x-label>

                                <x-textarea class="w-full" wire:model="postEditForm.content">
                                    <x-input-error for="postEditForm.content"></x-input-error>


                                </x-textarea>
                            </div>
                            {{-- secion  02 del formulario --}}
                            <div class="mb-4 ">

                                <label for="">
                                    Categorias

                                    <x-select class="w-full" wire:model="postEditForm.category_id">
                                        <x-input-error for="postEditForm.category_id"></x-input-error>
                                        <option value="" disabled>Selecione una Categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->name}}
                                            </option>

                                        @endforeach

                                    </x-select>
                                </label>
                            </div>
                            <div>
                                <ul>
                                    @foreach($tags as $tag)
                                        <li>
                                            <label>
                                                <x-checkbox type="checkbox" value="{{$tag->id}}"
                                                            wire:model="postEditForm.tags">


                                                </x-checkbox>
                                                {{$tag['title']}}

                                            </label>
                                        </li>

                                    @endforeach


                                </ul>
                                <x-input-error for="postEditForm.tags"></x-input-error>
                            </div>


                            <div class="flex justify-end">
                                <x-danger-button wire:click="$set('postEditForm.openModal',false)" class="mr-2">
                                    Cancelar

                                </x-danger-button>

                                <x-button>

                                    Actualizar

                                </x-button>


                            </div>


                        </form>
                        {{-- modal   de livewire, muestra una notificacion por cada evento disparado--}}

                        @push('js')
                            {{-- SOLUCION 1 --}}
                            <script>


                                Livewire.on('post-created', function ($messages) {
                                    console.log($messages)
                                });


                            </script>

                        @endpush()


                        <script>
                            /*                     {{-- SOLUCION 2 --}}
                            {{--  Inicializo el evento--}}
                            {{-- metodo  document.addEventListener  de ESCUCHA --}}
                            {{-- esucha el evento identificado " livewire:post-created' " --}}
                            {{-- una vez recepcionado el valor de evento, ejecuta la function() { // codigo en espera}  " --}}

                            document.addEventListener('livewire:post-created',function(){
                                            Livewire.on('post-created',function($messages){
                                                console.log($messages);
                                            })

                                       });


                             */
                        </script>


                    </div>
                </div>

            </div>

            @endif

        </div>


</div>
