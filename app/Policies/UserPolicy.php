<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    
    public function viewAny(User $user)
    {
        return strtolower($user->rol) === 'gerente'; 
    }

    public function update(User $user, User $model)
    {
        return strtolower($user->rol) === 'gerente'; 
    }

    public function delete(User $user, User $model)
    {
        return strtolower($user->rol) === 'gerente'; 
    }
}

