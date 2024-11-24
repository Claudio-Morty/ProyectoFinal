<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Salida;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::all();

        return view('salidas.listasalidas', compact('salidas'));
    }

    public function pdf()
    {
        $salidas = Salida::all(); 
        $pdf = pdf::loadView('categorias.pdf', compact('salidas'));
        return $pdf->stream();
    }   


    public function create()
    {
        $productos = Producto::all(); 

        return view('salidas.crearsalida', compact('productos'));
    }

    public function edit($id)
    {
        $salida = Salida::findOrFail($id); 
        $productos = Producto::all();
        return view('salidas.editarsalida', compact('salida', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $salida = Salida::findOrFail($id); 
        $productoAnterior = Producto::findOrFail($salida->producto_id);
    
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'motivo' => 'required|string',
            'fecha' => 'required|date',
        ]);
    
        $productoAnterior->stock += $salida->cantidad;
        $productoAnterior->save();
    
        if ($request->producto_id != $salida->producto_id) {
            $productoNuevo = Producto::findOrFail($request->producto_id);
            $salida->producto_id = $request->producto_id;
        } else {
            $productoNuevo = $productoAnterior; 
        }
    
        if ($productoNuevo->stock < $request->cantidad) {
            return back()->withErrors(['cantidad' => 'No hay suficiente stock disponible en el producto seleccionado.']);
        }
    
        $productoNuevo->stock -= $request->cantidad;
        $productoNuevo->save();
    
        $salida->cantidad = $request->cantidad;
        $salida->motivo = $request->motivo;
        $salida->fecha = $request->fecha;
        $salida->save();
    
        return redirect()->route('salidas.index')->with('success', 'Salida actualizada correctamente.');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'stock' => 'required|integer|min:1',
            'motivo' => 'required|string',
            'fecha' => 'required|date',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        if ($producto->stock < $request->stock) {
            return back()->withErrors(['stock' => 'No hay suficiente stock disponible.']);
        }

        $salida = new Salida();
        $salida->producto_id = $request->producto_id;
        $salida->cantidad = $request->stock; 
        $salida->fecha = $request->fecha;
        $salida->motivo = $request->motivo;
        $salida->save();

        $producto->stock -= $request->stock;
        $producto->save();

        return redirect()->route('salidas.index')->with('success', 'Salida registrada correctamente y stock actualizado.');
    }

        public function destroy($id)
    {
        $salida = Salida::findOrFail($id);
        $producto = $salida->producto; 

        $producto->stock += $salida->cantidad;

        $salida->delete();

        $producto->save();

        return redirect()->route('salidas.index')->with('success', 'Salida eliminada correctamente y stock recuperado.');
    }

}
