<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>
        
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="anuncios">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" class="border @error('nombre') border-red-500 @enderror mt-1 block w-full rounded-md shadow-sm" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="precio" class="anuncios">Precio</label>
                <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" class="border @error('precio') border-red-500 @enderror mt-1 block w-full rounded-md shadow-sm" required>
                @error('precio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="precio_publico" class="anuncios">Precio Público</label>
                <input type="number" step="0.01" name="precio_publico" id="precio_publico" value="{{ old('precio_publico', $producto->precio_publico) }}" class="border @error('precio_publico') border-red-500 @enderror mt-1 block w-full rounded-md shadow-sm" required>
                @error('precio_publico')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="stock" class="anuncios">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $producto->stock) }}" class="border @error('stock') border-red-500 @enderror mt-1 block w-full rounded-md shadow-sm" required>
                @error('stock')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="categoria_id" class="anuncios">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="border @error('categoria_id') border-red-500 @enderror mt-1 block w-full rounded-md shadow-sm">
                    <option value="">Selecciona una categoría (opcional)</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ (old('categoria_id', $producto->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="anuncios">Imagen Actual</label>
                @if ($producto->imagen)
                    <img src="{{ asset($producto->imagen) }}" alt="Imagen del producto" width="100" class="mb-2">
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

            <button type="submit" class="boton-crud">Actualizar Producto</button>
        </form>
    </div>
</x-app-layout>


