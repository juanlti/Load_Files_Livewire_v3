<div>

    <h1 class="text-2x1 font-semibold">Soy el componente padre BIDIRECCIONAL</h1>
    <label for="">Comunicacion BIDIRECCIONAL </label>
    <x-input wire:model.live="atributoDeClaseCompartidaBidireccional"></x-input>


    <div>

        {{-- Sintaxis de etiqueta SINCRONIZADO (BIDIRECCIONAL) --}}
        <livewire:children-bidirecional wire:model="atributoDeClaseCompartidaBidireccional" value="atributoDeClaseCompartidaBidireccional"/>
        {{-- genere un enlace entre el componente father.blade y father.php --}}


    </div>
    {{--
    {{-- SINTANXIS PARA MULTIPLES COMPONENTES CON EL MISMO NOMBRE PERO CON DIFERENTES COMPORTAMIENTOS POR SU KEY
    @livewire('contador',[],key('contador-1'))
    @livewire('contador',[],key('contador-2'))
    @livewire('contador',[],key('contador-3'))
    @livewire('contador',[],key('contador-4'))
    @livewire('contador',[],key('contador-5'))
    @livewire('contador',[],key('contador-6'))

    <livewire:contador key="contador-7"/>
    --}}



</div>
