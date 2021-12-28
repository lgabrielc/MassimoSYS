<div>
    <button wire:click="abrirmodalcrear"
        class="ml-4 m-1 flex shadow w-32 block border-blue-600 border-2 rounded-full focus:outline-none focus:border-blue-600 px-4 py-2 text-blue-600 hover:bg-blue-600 hover:text-white">
        <svg class="inline-block h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387A7.731 7.731 0 007.1 19h5.8a7.68 7.68 0 001.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8zM12 8H8V5.199C8 3.754 8.797 3 10 3s2 .754 2 2.199V8z" />
        </svg>
        <span>Nuevo</span>
    </button>
    @include('livewire.admin.user.modaleditaruser')
    @include('livewire.admin.user.modalcrearuser')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <input placeholder="Search" wire:model="search"
        class="p-2 flex-1 appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-8 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
        autofocus />
    @if (count($users))
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Roles
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Precio
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $onlyuser)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$onlyuser->id}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$onlyuser->name}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{$onlyuser->email}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{-- @foreach ($onlyuser->getRoleNames() as $name)
                                    {{$name}}
                                    @endforeach --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a class="btn2 btn-blue mb-1 py-2" wire:click="edit({{$onlyuser->id}})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn2 btn-red mb-1 py-2" wire:click="$emit('delethis',{{$onlyuser->id}})">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if ($users->hasPages())
    <div class="px-6 py-3">
        {{ $users->links() }}
    </div>
    @endif
    @else
    <div class="px-6 py-4">
        No existe ningún registro coincidente
    </div>
    @endif
    {{-- @include('livewire.admin.producto.modaleditarproducto') --}}
    <script>
        livewire.on('delethis', deletid => {
            Swal.fire({
                title: 'Estás seguro?',
                text: "¡Está por eliminar este producto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('delet', deletid)
                    Swal.fire(
                        'Éxito!',
                        'Producto Eliminado.',
                        'success'
                    )
                }
            })
        });
    </script>
</div>