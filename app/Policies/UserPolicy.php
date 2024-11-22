<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->rol === 'gerente'; // Ejemplo de regla para listar usuarios
    }

    public function update(User $user, User $model)
    {
        return $user->id === $model->id || $user->rol === 'gerente'; // Ejemplo de regla
    }

    public function delete(User $user, User $model)
    {
        return $user->rol === 'gerente'; // Ejemplo de regla
    }

}
