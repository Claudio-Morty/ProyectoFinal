<x-app-layout>
    @section('content')
        <x-slot name="header">
            <h2 class="dashboard-title-prod">
                {{ __('Salidas') }}
            </h2>
        </x-slot>

        <div class="container-agreg">
            <h1 style="text-align: center; font-size: 28px; font-weight: bold; margin-bottom: 20px;">Añadir Salida</h1>
            
            <form action="{{ route('salidas.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="producto_id">Producto</label>
                    <select name="producto_id" id="producto_id" required>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">
                                {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="stock">Cantidad</label>
                    <input type="number" name="stock" id="stock" min="1" required>
                </div>

                <div class="form-group">
                    <label for="motivo">Motivo</label>
                    <select name="motivo" id="motivo" required>
                        <option value="venta">Venta</option>
                        <option value="daño">Daño</option>
                        <option value="mala calidad">Mala Calidad</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" required>
                </div>

                <button type="submit" class="submit-btn">Registrar Salida</button>
            </form>
        </div>
    @endsection
</x-app-layout>
