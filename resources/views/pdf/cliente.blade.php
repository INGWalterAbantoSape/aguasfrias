<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @page {
            margin: 0cm 0cm;
        }
        body {
            margin: 3cm 2cm 2cm;
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #004643;
            color: white;
            text-align: center;
            line-height: 1.5cm;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #004643;
            color: white;
            text-align: center;
            line-height: 1.5cm;
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ public_path('img/logotjfinal.png') }}" width="50" height="50" class="inline-block">
    </header>

    <main>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($clientes as $cliente)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->telefono }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <footer>
        &copy; {{ date('Y') }} Tu Empresa. Todos los derechos reservados.
    </footer>
</body>
</html>
