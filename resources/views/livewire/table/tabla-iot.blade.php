<div>
    <div x-data="{ open: false }" class="border border-gray-300 rounded-lg shadow my-5 p-5">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">PANEL DE CONTROL</h2>
            <button @click="open = !open" class="bg-blue-500 text-white px-4 py-2 rounded">
                <span x-show="open">Ocultar Filtros</span>
                <span x-show="!open">Mostrar Filtros</span>
            </button>
        </div>
        <div x-show="open" class="flex flex-row flex-wrap -mx-2">
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
        </div>
        <table
            class="block py-5 w-full overflow-x-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">id</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">sensor</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Fecha</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach($datos as $dato)
                <tr class="hover:bg-gray-50" wire:key="eliminar-cliente-{{ $dato->id }}">
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
                            {{-- <div class="font-medium text-gray-700">{{ $dato->id }}</div> --}}
                            {{-- <div class="text-gray-400">{{ $dato->estado }}</div> --}}
                        </div>
                    </th>
                    <td class="px-6 py-4">{{ $dato->sensor_valor }}</td>
                    <td class="px-6 py-4">{{ $dato->created_at }}</td>
                    <td class="px-6 py-4">
                        @if ($dato->estado === 'activo')
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
                            <livewire:Eliminar.eliminar-cliente wire:key="eliminar-cliente-{{ $dato->id }}"
                                :modelo="'Riego'" :clienteId="$dato->id" />
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $datos->links() }}
    </div>
</div>