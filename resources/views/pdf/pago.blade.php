<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta de Pago</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
    
</head>
<body>
    <div class="boleta p-8 mx-auto bg-white border border-gray-300 text-center">
        <header class="flex justify-between items-center border-b border-gray-300 pb-4 mb-6">
            <h1 class="text-3xl font-bold">Detalles del Pago</h1>
            <div>
                <img src="{{ public_path('img/logotjfinal.png') }}" alt="Logo" class="w-24 h-auto">
            </div>
        </header>
        <main>
            <p class="text-lg"><strong>Cliente:</strong> {{ $pago->suscripcion->cliente->nombre }}</p>
            <p class="text-lg"><strong>Servicio:</strong> {{ $pago->suscripcion->servicio->nombre }}</p>
            <p class="text-lg"><strong>Monto:</strong> {{ $pago->monto }}</p>
            <p class="text-lg"><strong>Método de Pago:</strong> {{ $pago->metodo_pago }}</p>
            <p class="text-lg"><strong>Fecha de Pago:</strong> {{ $pago->fecha_pago }}</p>
        </main>
        <footer class="border-t border-gray-300 pt-4 mt-6 text-center text-sm text-gray-600">
            <p>© {{ date('Y') }} empresa TJ. Todos los derechos reservados.</p>
        </footer>
    </div>
    
</body>
</html>
