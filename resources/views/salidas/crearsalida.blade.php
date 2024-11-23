@section('content')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('salidas') }}
            </h2>
        </x-slot>

        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Añadir salida</h1>

            <form action="{{ route('salidas.store') }}" method="POST">
    @csrf
    <label for="producto_id">Producto</label>
    <select name="producto_id" id="producto_id">
        @foreach($productos as $producto)
            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
        @endforeach
    </select>

    <label for="stock">Cantidad</label>
    <input type="number" name="stock" id="stock" required>

    <label for="motivo">Motivo</label>
    <select name="motivo" id="motivo">
        <option value="venta">Venta</option>
        <option value="daño">Daño</option>
        <option value="mala calidad">Mala Calidad</option>
    </select>

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha" id="fecha" required>

    <button type="submit">Registrar Salida</button>
</form>
