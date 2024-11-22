<x-app-layout>
    @section('content')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Productos') }}
            </h2>
        </x-slot>

        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Productos</h1>
            <a href="{{ route('productos.create') }}" class="boton-crud">Añadir Producto</a>
            
            <table class="tabla-per">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Precio Público</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->precio_publico }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                            <img src="{{ asset($producto->imagen) }}" alt="Imagen del producto" width="100">
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('productos.edit', $producto->id) }}" class="boton-crud">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="boton-borrar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</x-app-layout>