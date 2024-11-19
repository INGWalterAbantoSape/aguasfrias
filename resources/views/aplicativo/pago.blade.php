<x-app-layout>
    @section('title', 'Pagos')
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none';">
                    <path d="M14.348 14.849a1 1 0 001.414 0l4.826-4.828a1 1 0 00-1.414-1.414l-4.826 4.828-4.828-4.828a1 1 0 00-1.414 1.414l4.828 4.828z"/>
                </svg>
            </span>
        </div>
    @endif
    {{-- <livewire:registro.suscripcion> --}}
    <livewire:table.tabla-pago>
    @section('scripts')
    <script>
    </script>
    @endsection
</x-app-layout>
