<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class Hola extends Seeder
{
    public function run()
    {
        // Generar 10 registros de categorías utilizando factories
        for ($i = 1; $i <= 10; $i++) {
            Categoria::create([
                'descripcion' => 'Categoria ' . $i,
            ]);
        }

        $categorias = Categoria::all();

        // Generar 30 registros de productos
        for ($i = 1; $i <= 30; $i++) {
            Producto::create([
                'nombre' => 'Producto ' . $i,
                'marca' => 'Marca ' . $i,
                'precio' => rand(100, 10000) / 100,
                'stock' => random_int(0, 50), 
                'id_categoria' => $categorias->random()->id_categoria,
            ]);
    }
}
}
