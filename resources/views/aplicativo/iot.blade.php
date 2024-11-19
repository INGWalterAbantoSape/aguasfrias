<x-app-layout>
    @section('title', 'Pagos')
    <div class="flex space-x-4">
        <div class="w-1/2 m-5">
            <livewire:table.tabla-iot />
        </div>
        <div class="w-1/2">
            <livewire:iot.vista />
        </div>
    </div>
    @section('scripts')
    <script>
    </script>
    @endsection
</x-app-layout>

