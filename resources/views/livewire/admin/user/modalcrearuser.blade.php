<x-jet-dialog-modal wire:model='abrirmodalcrear'>
    <x-slot name="title">
        Agregar Usuario
    </x-slot>
    <x-slot name="content">
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4">
                Nombre
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6" placeholder="Ejm: Lucho" wire:model="nombre" />
            @error('nombre')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4">
                Email
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6" placeholder="Ejm: Lucho100@hotmail.com"
                wire:model="email" />
            @error('email')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4">
                Password
            </label>
            <x-jet-input type="text" class="block mt-1 w-full px-6" wire:model="password" />
            @error('password')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4">
                Roles
            </label>
            {{-- <select wire:model="selectrole"> --}}
                {{-- <option value="">Seleccione un rol</option> --}}
                @foreach ($roles as $index => $rol)
                {{-- <option value="{{$rol->id}}">{{$rol->name}}</option> --}}
                <input type="checkbox" wire:model="selectrole.{{$index}}" value="{{$rol->id}}">{{$rol->name}}
                @endforeach
                {{-- </select> --}}
            @error('email')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('abrirmodalcrear',false)" wire:loading.attr="disabled"
            class="float-left">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-danger-button wire:click="saveuser" wire:loading.attr="disabled">
            {{ __('Guardar Cambios') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>