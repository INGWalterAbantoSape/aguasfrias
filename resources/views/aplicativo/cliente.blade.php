<x-app-layout>
    @section('title', 'cliente')
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
    <div class="py-4">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <livewire:table.tabla-cliente wire:key="EliminarCliente"/>
            </div>
        </div>
    </div>
</x-app-layout>
