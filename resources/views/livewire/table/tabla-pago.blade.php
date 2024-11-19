
<div class="bg-white p-4 m-4 rounded-lg shadow-md">
    <div class="flex justify-end mx-1 bg-slate-200 rounded-lg shadow my-5 px-10 py-5">
        <div class="w-50 md:w-1/4 px-2 mb-2">
            <input type="text" class="form-input mt-1 block w-full" wire:model.lazy="nombre" placeholder="Nombre del cliente">
        </div>
    </div>
    
    
    <h2 class="text-2xl font-bold mb-4 text-center">Lista de Pagos</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Suscripcion</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Monto</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha de Pago</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Metodo de Pago</th>
                {{-- <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado</th> --}}
                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($pagos as $pago)
            <tr wire:key="{{$pago->id}}">
                <td class="px-6 py-4 whitespace-nowrap">{{ $pago->suscripcion->servicio->nombre }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $pago->monto }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $pago->fecha_pago }}</td>
                {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $pago->metodo_pago }}</td> --}}
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($pago->metodo_pago === 'pendiente')
                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                            Pendiente
                        </span>
                    @else
                        @if ($pago->metodo_pago === 'tarjeta')
                            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                                Tarjeta
                            </span>
                        @endif
                        @if ($pago->metodo_pago === 'efectivo')
                            <span class="inline-flex items-center gap-1 rounded-full bg-yellow-50 px-2 py-1 text-xs font-semibold text-yellow-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-yellow-600"></span>
                                Efectivo
                            </span>
                        @endif
                        @if ($pago->metodo_pago === 'transferencia')
                            <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                Inactivo
                            </span>
                        @endif
                    @endif
                </td>
                
                @if (auth()->user()->role == 'admin')
                <td class="px-6 py-4 whitespace-nowrap text-left">
                <div class="flex justify-start gap-4">
                    <button wire:click='pdf({{$pago}})' wire:confirm='¿imprimir voucher?' class="bg-white text-white px-4 py-2 rounded-xl hover:bg-black cursor-pointer">
                        <svg class="h-6 w-6 text-red-600"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />  <polyline points="13 2 13 9 20 9" /></svg>                          
                    </button>
                    <livewire:actualizar.pago wire:key="{{ $pago->id }}"
                        :pago="$pago" />
                </div>
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
        {{ $pagos->links() }}
    </div>
</div>