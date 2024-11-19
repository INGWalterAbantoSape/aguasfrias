<div class="bg-white p-4 m-4 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Lista de Suscripciones</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cliente</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Servicio</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha de Inicio</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha de Fin</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($suscripciones as $suscripcion)
            <tr wire:key="{{$suscripcion->id}}">
                <td class="px-6 py-4 whitespace-nowrap">{{ $suscripcion->cliente->nombre }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $suscripcion->servicio->nombre }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $suscripcion->fecha_inicio }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $suscripcion->fecha_fin }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($suscripcion->estado === 'activa')
                    <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                        Activo
                    </span>
                    @else
                    <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                        Inactivo
                    </span>
                    @endif
                </td>
                @if (auth()->user()->role == 'admin')
                <td class="px-6 py-4 whitespace-nowrap text-center">
                    <button wire:click='eliminar({{$suscripcion}})' wire:confirm='¿Está seguro de eliminar?' class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </td>
            @else
                <td class="px-6 py-4 whitespace-nowrap text-center">
                    <button type="button" class="bg-gray-400 text-black px-4 py-2 rounded-xl cursor-not-allowed" disabled>
                        Eliminar
                    </button>
                </td>
            @endif
            
            </tr>
            @endforeach
        </tbody>
        
    </table>
    <div class="mt-4">
        {{ $suscripciones->links() }}
    </div>
</div>