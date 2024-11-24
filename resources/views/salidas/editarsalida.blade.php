<x-app-layout>
    @section('content')
        <x-slot name="header">
            <h2 class="dashboard-title-prod">
                {{ __('Editar Salida') }}
            </h2>
        </x-slot>

        <div class="container-agreg">
            
            <form action="{{ route('salida.update', $salida->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="producto_id">Producto</label>
                    <select name="producto_id" id="producto_id" required>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" {{ $producto->id == $salida->producto_id ? 'selected' : '' }}>
                                {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" min="1" value="{{ $salida->cantidad }}" required>
                </div>

                <div class="form-group">
                    <label for="motivo">Motivo</label>
                    <select name="motivo" id="motivo" required>
                        <option value="venta" {{ $salida->motivo == 'venta' ? 'selected' : '' }}>Venta</option>
                        <option value="daño" {{ $salida->motivo == 'daño' ? 'selected' : '' }}>Daño</option>
                        <option value="mala calidad" {{ $salida->motivo == 'mala calidad' ? 'selected' : '' }}>Mala Calidad</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" value="{{ $salida->fecha }}" required>
                </div>

                <button type="submit" class="submit-btn">Actualizar Salida</button>
            </form>
        </div>
    @endsection
</x-app-layout>
