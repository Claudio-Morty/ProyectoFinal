<x-app-layout>
    @section('content')
        <x-slot name="header">
            <h2 class="dashboard-title-categ">
                {{ __('Editar Categoria') }}
            </h2>
        </x-slot>

        <div class="container-edit-categ">
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre de la Categoría</label>
                    <input type="text" name="nombre" id="nombre" 
                        value="{{ old('nombre', $categoria->nombre) }}" 
                        class="form-control @error('nombre') error-border @enderror" 
                        required>
                    @error('nombre')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Imagen Actual</label>
                    @if ($categoria->imagen)
                        <img src="{{ asset($categoria->imagen) }}" alt="Imagen de la Categoría" class="image-preview">
                    @else
                        <p class="no-image">No hay imagen disponible</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="imagen">Nueva Imagen (opcional)</label>
                    <input type="file" name="imagen" id="imagen" 
                        class="form-control @error('imagen') error-border @enderror" 
                        accept="image/*">
                    @error('imagen')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="submit-btn ">Actualizar Categoría</button>
            </form>
        </div>
    @endsection
</x-app-layout>

