@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Salida</h2>
        <form action="{{ route('salidas.update', $salida->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="producto_id">Producto</label>
                <select name="producto_id" id="producto_id" class="form-control">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}" {{ $producto->id == $salida->producto_id ? 'selected' : '' }}>
                            {{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $salida->cantidad }}">
            </div>

            <div class="form-group">
                <label for="motivo">Motivo</label>
                <select name="motivo" id="motivo" class="form-control">
                    <option value="venta" {{ $salida->motivo == 'venta' ? 'selected' : '' }}>Venta</option>
                    <option value="daño" {{ $salida->motivo == 'daño' ? 'selected' : '' }}>Daño</option>
                    <option value="baja_venta" {{ $salida->motivo == 'baja_venta' ? 'selected' : '' }}>Baja Venta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $salida->fecha }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Salida</button>
        </form>
    </div>
@endsection
