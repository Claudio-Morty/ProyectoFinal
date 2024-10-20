<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Categorias</h1>
        <a href="{{ route('categorias.create') }}" class="boton-crud">Añadir Categoria</a>
        
        <table class="tabla-per">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                        <img src="{{ asset($categoria->imagen) }}" alt="Imagen de la Categoria" width="100">
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('categorias.edit', $categorias->id) }}" class="boton-crud">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoria?');">
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
</x-app-layout>