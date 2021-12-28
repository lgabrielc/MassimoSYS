<x-jet-dialog-modal wire:model='abrirmodaleditar'>
    <x-slot name="title">
        Editar Producto
    </x-slot>
    <x-slot name="content">
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" >
                Nombre
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6"  placeholder="Ejm: Leche Gloria" wire:model="enombre" />
            @error('enombre')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" >
                Descripcion
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6" placeholder="Ejm: 500 ml" wire:model="edescripcion" />
            @error('edescripcion')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" >
                Stock
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6" placeholder="Ejm: 5" wire:model="estock" />
            @error('estock')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" >
                Precio
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6" placeholder="Ejm: 2.00" wire:model="eprecio" />
            @error('eprecio')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('abrirmodaleditar',false)" wire:loading.attr="disabled" class="float-left">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-danger-button wire:click="update" wire:loading.attr="disabled">
            {{ __('Guardar Cambios') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>