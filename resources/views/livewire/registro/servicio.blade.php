<div class="p-4">
    @if (session()->has('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('message') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none';">
                <path
                    d="M14.348 14.849a1 1 0 001.414 0l4.826-4.828a1 1 0 00-1.414-1.414l-4.826 4.828-4.828-4.828a1 1 0 00-1.414 1.414l4.828 4.828z" />
            </svg>
        </span>
    </div>
    @endif
<form class="bg-white p-10 rounded-lg shadow-lg min-w-full" wire:submit.prevent="CrearServicio">
    <div>
        <label class="text-gray-800 font-semibold block my-3 text-md" for="nombre">nombre</label>
        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="nombre"
            id="nombre" placeholder="nombre" wire:model="nombre" />
        <div>
            @error('nombre') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>
    </div>
    <div>
        <label class="text-gray-800 font-semibold block my-3 text-md" for="descripcion">descripcion</label>
        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="descripcion"
            id="descripcion" placeholder="descripcion" wire:model="descripcion" />
        <div>
            @error('descripcion') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>
    </div>
    <div>
        <label class="text-gray-800 font-semibold block my-3 text-md" for="precio">precio</label>
        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="number" name="precio"
            id="precio" placeholder="precio" wire:model="precio" />
        <div>
            @error('precio') <span class="error text-red-600">{{ $message }}</span> @enderror
        </div>
    </div>
    <div>
        <label class="text-gray-800 font-semibold block my-3 text-md" for="tipo">Tipo</label>
        <select class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" name="estado"
            id="tipo" wire:model="tipo">
            <option value="">Seleccione un estado de venta</option>
            <option value="quincenal">quincenal</option>
            <option value="mensual">mensual</option>
            <option value="anual">anual</option>
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
            <span x-show="!loading">Registrar</span>
        </button>
    </div>
</form>
</div>