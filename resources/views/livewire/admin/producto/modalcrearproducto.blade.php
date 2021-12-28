<x-jet-dialog-modal wire:model='abrirmodalcrear'>
    <x-slot name="title">
        Crear nuevo Servidor
    </x-slot>
    <x-slot name="content">
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" >
                Nombre
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6"  placeholder="Ejm: Leche Gloria" wire:model="nombre" />
            @error('nombre')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" >
                Descripcion
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6" placeholder="Ejm: 500 ml" wire:model="descripcion" />
            @error('descripcion')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" >
                Stock
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6" placeholder="Ejm: 5" wire:model="stock" />
            @error('stock')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" >
                Precio
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6" placeholder="Ejm: 2.00" wire:model="precio" />
            @error('precio')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('abrirmodalcrear',false)" wire:loading.attr="disabled" class="float-left">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-danger-button wire:click="save" wire:loading.attr="disabled">
            {{ __('Guardar Cambios') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
