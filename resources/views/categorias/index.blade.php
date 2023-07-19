<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Listado de Categorías</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-8">
        <h1 class="text-2xl font-bold mb-4">Listado de Categorías</h1>
        <ul class="space-y-2">
            @foreach ($categorias as $categoria)
                <li class="bg-white p-4 shadow rounded">{{ $categoria->descripcion }}</li>
            @endforeach
        </ul>

        {{ $categorias->links() }} <!-- Mostrar la paginación -->
    </div>
</body>
</html>