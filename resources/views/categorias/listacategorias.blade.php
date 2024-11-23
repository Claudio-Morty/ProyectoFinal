<x-app-layout>
    @section('content')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categorías') }}
            </h2>
        </x-slot>

        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Categorías</h1>
            
            <a href="{{ route('categorias.create') }}" class="boton-crud">Añadir Categoría</a>

            <table class="tabla-per">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categorias->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center py-4">No hay categorías disponibles.</td>
                        </tr>
                    @else
                        @foreach($categorias as $categoria)
                            <tr>
                                <td>
                                    <a href="{{ route('categorias.show', $categoria->id) }}" class="text-blue-600 underline">
                                        {{ $categoria->nombre }}
                                    </a>
                                </td>
                                <td>
                                    <img src="{{ asset($categoria->imagen) }}" alt="Imagen de la Categoria" width="100">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="boton-crud">Editar</a>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="boton-borrar">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    @endsection
</x-app-layout>
