<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine si el usuario puede ver la lista de usuarios.
     */
    public function viewAny(User $user)
    {
        return strtolower($user->rol) === 'gerente'; 
    }

    /**
     * Determine si el usuario puede actualizar a otro usuario.
     */
    public function update(User $user, User $model)
    {
        return strtolower($user->rol) === 'gerente'; 
    }

    /**
     * Determine si el usuario puede eliminar a otro usuario.
     */
    public function delete(User $user, User $model)
    {
        return strtolower($user->rol) === 'gerente'; 
    }
}

