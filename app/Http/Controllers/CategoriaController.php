<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.listacategorias', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.agregarcategoria');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        

        $file = $request->file('imagen');

        $filename = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('storage/imagenes'), $filename);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->imagen = 'storage/imagenes/' . $filename;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito.');
    }


    public function edit(Categoria $categoria)
    {
        return view('categorias.editarcategoria', compact('categoria'));
    }

    
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('imagen')) {
            if ($categoria->imagen && file_exists(public_path($categoria->imagen))) {
                unlink(public_path($categoria->imagen));
            }

            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
            $validated['imagen'] = 'storage/' . $imagenPath;
        } else {
            $validated['imagen'] = $categoria->imagen;
        }

        $categoria->update($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoria actualizada exitosamente');
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria eliminado correctamente.');
    }
}
