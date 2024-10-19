<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold text-gray-800">Productos</h2>
                        <p class="text-gray-600">Gestión de productos</p>
                        <a href="{{ route('productos.index') }}" class="text-blue-500 hover:underline mt-2 inline-block">Ver productos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
