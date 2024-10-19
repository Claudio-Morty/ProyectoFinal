<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.listaproductos', compact('productos'));
    }

    
    public function create()
    {
        return view('productos.agregarproducto');
    }

    
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'precio_publico' => 'required|numeric',
        'stock' => 'required|integer',
        'imagen' => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $file = $request->file('imagen');

    $filename = time() . '.' . $file->getClientOriginalExtension();

    $file->move(public_path('storage/imagenes'), $filename);

    $producto = new Producto();
    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->precio_publico = $request->precio_publico;
    $producto->stock = $request->stock;
    $producto->imagen = 'storage/imagenes/' . $filename;
    $producto->save();

    return redirect()->route('productos.index')->with('success', 'Producto agregado correctamente.');
}

    

    public function edit(Producto $producto)
    {
        return view('productos.editarproducto', compact('producto'));
    }


    public function update(Request $request, Producto $producto)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'precio_publico' => 'required|numeric',
        'stock' => 'required|integer',
        'imagen' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:5120',
    ]);

    if ($request->hasFile('imagen')) {
        if ($producto->imagen && file_exists(public_path($producto->imagen))) {
            unlink(public_path($producto->imagen));
        }

        $imagenPath = $request->file('imagen')->store('imagenes', 'public');
        $validated['imagen'] = 'storage/' . $imagenPath;
    } else {
        $validated['imagen'] = $producto->imagen;
    }

    $producto->update($validated);

    return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
}

    


    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
