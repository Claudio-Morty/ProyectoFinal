<x-app-layout>
    @section('content')
        <x-slot name="header">
            <h2 class="dashboard-title">Agregar Categorías</h2>
        </x-slot>

        <div class="container-edit">
            <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre de la Categoría</label>
                    <input type="text" name="nombre" id="nombre" 
                        class="form-control @error('nombre') error-border @enderror" 
                        required value="{{ old('nombre') }}">
                    @error('nombre')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" 
                        class="form-control @error('imagen') error-border @enderror" 
                        required accept="image/*">
                    @error('imagen')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="submit-btn ">Guardar Categoría</button>
            </form>
        </div>
    @endsection
</x-app-layout>
