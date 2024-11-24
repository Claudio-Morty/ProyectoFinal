@extends('layouts.app')

@section('content')
<div class="container-edit">
    <h2 class="dashboard-title-prod">Editar Usuario</h2>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="nuevo-label">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email" class="nuevo-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="rol" class="nuevo-label">Rol</label>
            <select id="rol" name="rol" class="form-control">
                <option value="empleado" {{ $user->rol === 'empleado' ? 'selected' : '' }}>Empleado</option>
                <option value="gerente" {{ $user->rol === 'gerente' ? 'selected' : '' }}>Gerente</option>
            </select>
        </div>

        <button type="submit" class="boton-crud">Guardar</button>
    </form>
</div>
@endsection
