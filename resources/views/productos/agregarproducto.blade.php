<x-app-layout>
    @section('content')
        <x-slot name="header">
            <h2 class="dashboard-title-prod">
                {{ __('Agregar Productos') }}
            </h2>
        </x-slot>

        <div class="container-agreg">
            
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio') }}" required>
                    @error('precio')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="precio_publico">Precio Público</label>
                    <input type="number" step="0.01" name="precio_publico" id="precio_publico" value="{{ old('precio_publico') }}" required>
                    @error('precio_publico')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required>
                    @error('stock')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" required accept="image/*">
                    @error('imagen')
                        <span class="error">{{ $message }}</span>
                    @enderror   
                </div>

                <div class="form-group">
                    <label for="categoria_id">Categoría</label>
                    <select name="categoria_id" id="categoria_id">
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="submit-btn">Guardar Producto</button>
            </form>
        </div>
    @endsection
</x-app-layout>


