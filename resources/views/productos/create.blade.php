<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Registrar Producto</title>
    <style>
        body {
  font-family: 'Open Sans', sans-serif;
}


    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-8">
        <h1 class="text-4xl font-bold mb-4">Registrar Producto</h1>

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block font-medium">Nombre:</label>
                <input type="text" name="nombre" maxlength="100" class="w-full border rounded px-2 py-1" required>
            </div>

            <div class="mb-4">
                <label for="marca" class="block font-medium">Marca:</label>
                <input type="text" name="marca" class="w-full border rounded px-2 py-1" >
            </div>

            <div class="mb-4">
                <label for="precio" class="block font-medium">Precio:</label>
                <input type="double" name="precio" class="w-full border rounded px-2 py-1" required>
            </div>


            <div class="mb-4">
                <label for="stock" class="block font-medium">Stock:</label>
                <input type="number" name="stock" min="0" class="w-full border rounded px-2 py-1" >
            </div>

            <div class="mb-4">
                <label for="categoria" class="block font-medium">Categoría:</label>
                <select name="categoria" class="w-full border rounded px-2 py-1" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Registrar Producto</button>
        </form>
    </div>
    
</body>
</html>