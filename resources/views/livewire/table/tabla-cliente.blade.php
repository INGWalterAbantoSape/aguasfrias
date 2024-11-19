<div>
    <div x-data="{ open: false }" class="border border-gray-300 rounded-lg shadow my-5 p-5">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Clientes del sistema</h2>
            <button @click="open = !open" class="bg-blue-500 text-white px-4 py-2 rounded">
                <span x-show="open">Ocultar Filtros</span>
                <span x-show="!open">Mostrar Filtros</span>
            </button>
        </div>
        <div x-show="open" class="flex flex-row flex-wrap -mx-2">
            <div class="w-full md:w-1/4 px-2">
                <input type="text"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    wire:model.lazy="nombre" placeholder="Nombre">
            </div>
            <div class="w-full md:w-1/4 px-2">
                <input type="text"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    wire:model.lazy="telefono" placeholder="Teléfono">
            </div>
            <div class="w-full md:w-1/4 px-2">
                <input type="date"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    wire:model.lazy="fechaInicial" placeholder="Fecha Inicial">
            </div>
            <div class="w-full md:w-1/4 px-2">
                <input type="date"
                    class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    wire:model.lazy="fechaFinal" placeholder="Fecha Final">
            </div>
        </div>
    </div>


    <p></p>
    <div class="flex flex-wrap mx-1 bg-white rounded-lg shadow my-5 px-4 py-5">
        <div x-data="{ open: false }" x-on:cerrar-modal.window="open = false" class="px-5">
            <!-- Open modal button -->
            <button x-on:click="open = true" class="px-4 py-2 bg-lime-500 text-white rounded-md"> <svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </button>
            {{-- boton para exportar clientes --}}
            <button wire:click='pdf' onclick="return confirm('¿Exportar la informacion PDF?')"
            class="bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>              
        </button>
        
            <!-- Modal Overlay -->
            <div x-show="open" class="fixed inset-0 px-2 z-10 overflow-hidden flex items-center justify-center">
                <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <!-- Modal Content -->
                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300"
                    x-transition:enter-start="transform scale-75" x-transition:enter-end="transform scale-100"
                    x-transition:leave="transition-transform ease-in duration-300"
                    x-transition:leave-start="transform scale-100" x-transition:leave-end="transform scale-75"
                    class="bg-white rounded-md shadow-xl overflow-hidden max-w-md w-full sm:w-96 md:w-1/2 lg:w-2/3 xl:w-1/3 z-50">
                    <!-- Modal Header -->
                    <div class="bg-indigo-500 text-white px-4 py-2 flex justify-between">
                        <h2 class="text-lg font-semibold">Cliente nuevo</h2>
                        <button x-on:click="open = false" class="text-white focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- formulario para el registro de cliente -->
                    <livewire:registro.cliente />
                    <!-- Modal Footer -->
                    <div class="border-t px-4 py-2 flex justify-end">
                        <button x-on:click="open = false"
                            class="px-3 py-1 bg-indigo-500 text-white  rounded-md w-full sm:w-auto"> CERRAR </button>
                    </div>
                </div>
            </div>
        </div>
        <table
            class="block py-5 w-full overflow-x-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Informacion</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Telefono</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Puntos</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Fecha</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach($clientes as $cliente)
                <tr class="hover:bg-gray-50" wire:key="eliminar-cliente-{{ $cliente->id }}">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                        <div class="relative h-10 w-10 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span
                                class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                        </div>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">{{ $cliente->nombre }}</div>
                            <div class="text-gray-400">{{ $cliente->email }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">{{ $cliente->direccion }}</td>
                    <td class="px-6 py-4">{{ $cliente->telefono }}</td>
                    <td class="px-6 py-4">{{ $cliente->puntos }}</td>
                    <td class="px-6 py-4">{{ $cliente->created_at }}</td>
                    <td class="px-6 py-4">
                        @if ($cliente->estado === 'activo')
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                            Activo
                        </span>
                        @else
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                            Inactivo
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">
                            <livewire:Eliminar.eliminar-cliente wire:key="eliminar-cliente-{{ $cliente->id }}"
                                :modelo="'Cliente'" :clienteId="$cliente->id" />
                            <livewire:actualizar.cliente wire:key="actualizar-cliente-{{ $cliente->id }}"
                                :clienteId="$cliente->id" />
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $clientes->links() }}
    </div>
</div>