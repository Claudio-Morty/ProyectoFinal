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
        return $user->rol === 'gerente'; 
    }


    public function update(User $user, User $model)
    {
        return $user->rol === 'gerente'; 
    }


    public function delete(User $user, User $model)
    {
        return $user->rol === 'gerente'; 
    }
}