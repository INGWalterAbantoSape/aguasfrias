<div class="bg-white p-4 rounded-lg shadow-md mb-6 m-10">
    @if ($error)
        <div class="text-red-500 font-bold">
            {{ $error }}
        </div>
    @endif
    <div class="text-lg">
        Valor del Sensor: <span class="font-bold">{{ $valorSensor }}</span>
    </div>
    <div class="text-lg">
        Estado del Relé: <span class="font-bold">{{ $estado }}</span>
    </div>
    <div class="space-x-4">
        <button wire:click="prender" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">
            Encender Relé
        </button>
        <button wire:click="apagar" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
            Apagar Relé
        </button>
    </div>
    <div class="p-10">
        <img src="https://www.fundacionaquae.org/wp-content/uploads/2020/03/regadio1.jpg" alt="">
    </div>
</div>
