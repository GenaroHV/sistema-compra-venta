<?php

namespace App\Policies;

use App\User;
use App\Venta;
use Illuminate\Auth\Access\HandlesAuthorization;

class VentaPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Administrador')) {
            return true;
        }
    }

    public function view(User $user, Venta $venta)
    {
        return $user->id === $venta->user_id || $user->hasPermissionTo('Ver Venta');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Venta');
    }
}
