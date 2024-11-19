<div class="bg-white p-4 rounded-lg shadow-md mb-6 m-10">
    <h2 class="text-2xl font-bold mb-4">Canjear Premio</h2>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="canjear">
        <div class="mb-4">
            <label for="cliente_id" class="block text-sm font-medium text-gray-700">Seleccionar Cliente</label>
            <select wire:model="cliente_id" id="cliente_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }} => puntos: {{ $cliente->puntos}}</option>
                @endforeach
            </select>
            @error('cliente_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <span class="font-medium">Puntos Actuales: </span>{{ $puntos_actuales }}
        </div>

        <div class="mb-4">
            <label for="premio_id" class="block text-sm font-medium text-gray-700">Seleccionar Premio</label>
            <select wire:model="premio_id" id="premio_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccione un premio</option>
                @foreach($premios as $premio)
                    <option value="{{ $premio->id }}">{{ $premio->nombre }} ({{ $premio->puntos_requeridos }} puntos)</option>
                @endforeach
            </select>
            @error('premio_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Canjear</button>
        </div>
    </form>
</div>
