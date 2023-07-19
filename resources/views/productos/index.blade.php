<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Listado de Productos</title>
    <style>
        body {
  font-family: 'Open Sans', sans-serif;
}


    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-8">
        <h1 class="text-4xl font-bold mb-6 text-center">Listado de Productos</h1>

        <!-- Agregar un botón para el enlace de registro de productos -->
        <div class="text-center mb-6">
            <a href="{{ route('productos.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Registrar Producto</a>
        </div>

        <!-- Mostrar el mensaje flash -->
        @if (session('search'))
            <div class="bg-green-200 px-4 py-2 rounded mb-6">
                Resultados de búsqueda para "{{ session('search') }}"
            </div>
        @endif

        <form action="{{ route('productos.search') }}" method="POST" class="mb-4">
            @csrf
            <div class="flex">
                <input type="text" name="search" class="w-full border rounded px-2 py-1" placeholder="Buscar por nombre">
                <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>
            </div>
        </form>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID Producto</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Categoría</th>
                    <th class="px-4 py-2">Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td class="border px-4 py-2">{{ $producto->id_producto }}</td>
                        <td class="border px-4 py-2">{{ $producto->nombre }}</td>
                        <td class="border px-4 py-2">{{ $producto->categoria->descripcion }}</td>
                        <td class="border px-4 py-2">{{ $producto->precio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $productos->links() }} <!-- Mostrar la paginación -->
    </div>
    
</body>
</html>