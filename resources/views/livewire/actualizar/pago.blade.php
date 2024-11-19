<div x-data="{ open: false }" x-on:cerrar-modal.window="open = false" class="text-gray-950">
    <button class="bg-white text-white px-4 py-2 rounded-xl hover:bg-black cursor-pointer"  x-on:click="open = true">
        <svg class="h-6 w-6 text-lime-600"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
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
                <h2 class="text-lg font-semibold">Actualizar Pago</h2>
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
                <form class="bg-white p-5 rounded-lg shadow-lg min-w-full" wire:submit.prevent="actualizarPago">
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="suscripcion_id">suscripcion_id</label>
                        <select  class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" wire:model="suscripcion_id" disabled>
                            @foreach($suscripciones as $suscripcion)
                                <option value="{{ $suscripcion->id }}">{{ $suscripcion->servicio->nombre }}</option>
                            @endforeach
                        </select>
                        <div>
                            @error('suscripcion_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="monto">monto</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                            name="monto" id="monto" placeholder="monto" wire:model="monto" />
                        <div>
                            @error('monto') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="fecha_pago">fecha_pago</label>
                        <input type="date" class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                            name="fecha_pago" id="fecha_pago" placeholder="fecha_pago" wire:model="fecha_pago" />
                        <div>
                            @error('fecha_pago') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="metodo_pago">metodo_pago</label>
                        <select class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" name="estado"
                            id="metodo_pago" wire:model="metodo_pago">
                            <option value="">Seleccione un estado</option>
                            <option value="pendiente">pendiente</option>
                            <option value="tarjeta">tarjeta</option>
                            <option value="efectivo">efectivo</option>
                            <option value="transferencia">transferencia</option>
                        </select>
                        <div>
                            @error('metodo_pago') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-black tracking-wide font-semibold font-sans">Actualizar</button>
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
