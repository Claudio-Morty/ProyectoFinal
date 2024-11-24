<x-app-layout>
    @section('content')
        <x-slot name="header">
         <h2 class="dashboard-title">Editar Producto</h2>
                {{ __('Editar Producto') }}
            </h2>
        </x-slot>

        <div class="container-editar">
            
            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" name="nombre" id="nombre" 
                        value="{{ old('nombre', $producto->nombre) }}" 
                        class="form-control @error('nombre') error-border @enderror" required>
                    @error('nombre')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio" 
                        value="{{ old('precio', $producto->precio) }}" 
                        class="form-control @error('precio') error-border @enderror" required>
                    @error('precio')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="precio_publico">Precio Público</label>
                    <input type="number" step="0.01" name="precio_publico" id="precio_publico" 
                        value="{{ old('precio_publico', $producto->precio_publico) }}" 
                        class="form-control @error('precio_publico') error-border @enderror" required>
                    @error('precio_publico')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" 
                        value="{{ old('stock', $producto->stock) }}" 
                        class="form-control @error('stock') error-border @enderror" required>
                    @error('stock')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria_id">Categoría</label>
                    <select name="categoria_id" id="categoria_id" 
                        class="form-control @error('categoria_id') error-border @enderror">
                        <option value="">Selecciona una categoría (opcional)</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ (old('categoria_id', $producto->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Imagen Actual</label>
                    @if ($producto->imagen)
                        <img src="{{ asset($producto->imagen) }}" alt="Imagen del producto" class="form-image">
                    @else
                        <p>No hay imagen disponible</p>
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

                <button type="submit" class="submit-btn">Actualizar Producto</button>
            </form>
        </div>
    @endsection
</x-app-layout>


