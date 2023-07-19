<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function index()
{
    $productos = Producto::with('categoria')->paginate(10);
    return view('productos.index', compact('productos'));
}

public function search(Request $request)
{
    $search = $request->input('search');

    if ($search) {
        $productos = Producto::where('nombre', 'LIKE', "%$search%")->with('categoria')->paginate(10);
    } else {
        $productos = Producto::with('categoria')->paginate(10);
    }
    return view('productos.index', compact('productos', 'search'));
}

public function create()
{
    $categorias = Categoria::all();
    return view('productos.create', compact('categorias'));
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'precio' => 'required',
        'categoria' => 'required',
    ]);

    Producto::create([
        'nombre' => $request->input('nombre'),
        'marca' => $request->input('marca'),
        'precio' => $request->input('precio'),
        'stock' => $request->input('stock'),
        'id_categoria' => $request->input('categoria'),
    ]);

    return redirect()->route('productos.index')->with('success', 'El producto se ha registrado correctamente.');
}
}
