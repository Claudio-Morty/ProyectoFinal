<x-app-layout>
    <x-slot name="header">
        <h2 class="dashboard-title-categ">
            {{ __('Agregar Categorias') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        
        <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

                <div class="mb-4">
                    <label for="nombre" class="anuncios">Nombre de la Categoria</label>
                    <input type="text" name="nombre" id="nombre" class="border @error('nombre') border-red-500 @enderror mt-1 block w-full rounded-md shadow-sm" required value="{{ old('nombre') }}">
                    @error('nombre')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="imagen" class="anuncios">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="border @error('imagen') border-red-500 @enderror mt-1 block w-full rounded-md shadow-sm" required accept="image/*">
                    @error('imagen')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="boton-crud">Guardar Categoria</button>
            </form>
        </div>
    @endsection
</x-app-layout>
