<div x-data="{ open: false }" x-on:cerrar-modal.window="open = false" class="text-gray-950">
    <button class="bg-white text-black px-4 py-2 rounded-xl hover:bg-cyan-300 cursor-pointer"  x-on:click="open = true">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
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
                <h2 class="text-lg font-semibold">Actualizar servicio</h2>
                <button x-on:click="open = false" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- formulario para el registro de cliente -->
            <div class="p-4">
                @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            onclick="this.parentElement.parentElement.style.display='none';">
                            <path
                                d="M14.348 14.849a1 1 0 001.414 0l4.826-4.828a1 1 0 00-1.414-1.414l-4.826 4.828-4.828-4.828a1 1 0 00-1.414 1.414l4.828 4.828z" />
                        </svg>
                    </span>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            onclick="this.parentElement.parentElement.style.display='none';">
                            <path
                                d="M14.348 14.849a1 1 0 001.414 0l4.826-4.828a1 1 0 00-1.414-1.414l-4.826 4.828-4.828-4.828a1 1 0 00-1.414 1.414l4.828 4.828z" />
                        </svg>
                    </span>
                </div>
                @endif
                <form class="bg-white p-5 rounded-lg shadow-lg min-w-full" wire:submit.prevent="actualizarServicio">
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="nombre">Nombre</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                            name="nombre" id="nombre" placeholder="Nombre" wire:model="nombre" />
                        <div>
                            @error('nombre') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="descripcion">descripcion</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                            name="descripcion" id="descripcion" placeholder="descripcion" wire:model="descripcion" />
                        <div>
                            @error('descripcion') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="precio">Precio</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                            name="precio" id="precio" placeholder="precio" wire:model="precio" />
                        <div>
                            @error('precio') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="tipo">Tipo</label>
                        <select class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" name="estado"
                            id="tipo" wire:model="tipo">
                            <option value="">Seleccione un estado</option>
                            <option value="quincenal">quincenal</option>
                            <option value="mensual">mensual</option>
                            <option value="anual">anual</option>
                        </select>
                        <div>
                            @error('estado') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="estado">Estado</label>
                        <select class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" name="estado"
                            id="estado" wire:model="estado">
                            <option value="">Seleccione un estado</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                        <div>
                            @error('estado') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div x-data="{ loading: false }" class="flex justify-center">
                        <button @click="loading = true; setTimeout(() => { loading = false }, 1000)"
                            type="submit"
                            class="w-50 md:w-auto mt-3 px-4 py-2 text-lg text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-lg shadow-md transition duration-150 ease-in-out flex items-center justify-center">
                            <svg x-show="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0116 0v1h2V12a10 10 0 10-10 10v-2a8 8 0 01-8-8z"></path>
                            </svg>
                            <span x-show="!loading">Actualizar</span>
                        </button>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="border-t px-2 py-1 flex justify-end">
                <button x-on:click="open = false"
                    class="px-3 py-1 bg-indigo-500 text-white rounded-md w-full sm:w-auto">CERRAR</button>
            </div>
        </div>
    </div>
</div>
