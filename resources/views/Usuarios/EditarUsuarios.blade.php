@extends('layouts.app')

@section('content')
    <h1>Editar Usuario</h1>

    <form action="{{ route('usuarios.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control" id="rol" name="rol">
                <option value="empleado" {{ old('rol', $user->rol) == 'empleado' ? 'selected' : '' }}>Empleado</option>
                <option value="gerente" {{ old('rol', $user->rol) == 'gerente' ? 'selected' : '' }}>Gerente</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
