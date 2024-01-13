<div>
    {{-- The whole world belongs to you. --}}
    <div class="mb-4">
        <x-input class="w-full" type="number" wire:model.live="post_id"/>
    </div>
    {{--Para acceder a una variable computada (sintaxis de un emtodo), debemos anteponer el $this--> --}}
    {{$this->post}}
</div>
