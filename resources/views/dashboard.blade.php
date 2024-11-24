<x-app-layout>
    @section('content')
        <x-slot name="header">
        <h2 class="dashboard-title">
        {{ __('Página Principal') }}
        </h2>
        </x-slot>

        <div class="dashboard-container">
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                        <div class="dashboard-card">
                            <h2>Usuarios</h2>
                            <p>Gestión de Usuarios</p>
                            <a href="{{ route('users.index') }}" class="btn-dashboard">Ver Usuarios</a>
                        </div>
                        <div class="dashboard-card">
                            <h2>Salidas</h2>
                            <p>Gestión de Salidas</p>
                            <a href="{{ route('salidas.index') }}" class="btn-dashboard">Ver Salidas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
