<?php

namespace App\Policies;

use App\Compra;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompraPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Administrador')) {
            return true;
        }
    }

    public function view(User $user, Compra $compra)
    {
        return $user->id === $compra->user_id || $user->hasPermissionTo('Ver Compra');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Compra');
    }
}
