<div class="bg-white p-4 m-4 rounded-lg shadow-md mb-6 ">
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
    <h2 class="text-2xl font-bold mb-4">Registrar Suscripción</h2>
    <form wire:submit.prevent="agregar" class="flex flex-wrap items-end space-x-4">
        <div class="flex-1">
            <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente</label>
            <select wire:model="cliente_id" id="cliente_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
            @error('cliente_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex-1">
            <label for="servicio_id" class="block text-sm font-medium text-gray-700">Servicio</label>
            <select wire:model="servicio_id" id="servicio_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccione un servicio</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>
            @error('servicio_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex-1">
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" wire:model="fecha_inicio" id="fecha_inicio" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('fecha_inicio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex-1">
            <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de Fin</label>
            <input type="date" wire:model="fecha_fin" id="fecha_fin" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('fecha_fin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-6">Registrar</button>
        </div>
    </form>
</div>