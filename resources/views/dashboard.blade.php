<x-app-layout>
    <x-slot name="header">
        <h2 class="dashboard-title">
            {{ __('Página Principal') }}
        </h2>
    </x-slot>

    <div class="py-12 dashboard-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h2>Productos</h2>
                    <p>Gestión de productos</p>
                    <a href="{{ route('productos.index') }}" class="btn-dashboard">Ver productos</a>
                </div>
                <div class="dashboard-card">
                    <h2>Categorías</h2>
                    <p>Gestión de categorías</p>
                    <a href="{{ route('categorias.index') }}" class="btn-dashboard">Ver categorías</a>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>

