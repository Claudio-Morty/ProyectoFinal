@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="anuncios">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label for="email" class="anuncios">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="mb-3">
            <label for="rol" class="anuncios">Rol</label>
            <select class="form-control" id="rol" name="rol">
                <option value="empleado" {{ $user->rol === 'empleado' ? 'selected' : '' }}>Empleado</option>
                <option value="gerente" {{ $user->rol === 'gerente' ? 'selected' : '' }}>Gerente</option>
            </select>
        </div>

        <button type="submit" class="boton-crud">Guardar</button>
    </form>
</div>
@endsection
