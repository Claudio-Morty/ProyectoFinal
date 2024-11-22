<x-app-layout>
    <x-slot name="header">
        <h2 class="dashboard-title-categ">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="anuncios">Nombre de la Categoria</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categoria->nombre) }}" class="border @error('nombre') border-red-500 @enderror mt-1 block w-full rounded-md shadow-sm" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="anuncios">Imagen Actual</label>
                @if ($categoria->imagen)
                    <img src="{{ asset($categoria->imagen) }}" alt="Imagen de la Categoria" width="100" class="mb-2">
                @else
                    <p>No hay imagen disponible</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="imagen" class="anuncios">Nueva Imagen (opcional)</label>
                <input type="file" name="imagen" id="imagen" class="border @error('imagen') border-red-500 @enderror mt-1 block w-full rounded-md shadow-sm" accept="image/*">
                @error('imagen')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="boton-crud">Actualizar Categoria</button>
        </form>
    </div>
</x-app-layout>

