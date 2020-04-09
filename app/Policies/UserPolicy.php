<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if( $user->hasRole('Administrador')){
            return true;
        }
    }

    public function view(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Ver Usuario');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Usuario');
    }

    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Editar Usuario');
    }

    public function delete(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Eliminar Usuario');
    }
}
