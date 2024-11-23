@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Salidas</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="tabla-per">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salidas as $salida)
                    <tr>
                        <td>{{ $salida->producto->nombre }}</td>
                        <td>{{ $salida->cantidad }}</td>
                        <td>{{ $salida->motivo }}</td>
                        <td>{{ $salida->fecha }}</td>
                        <td>
                            <a href="{{ route('salida.edit', $salida->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('salida.destroy', $salida->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
