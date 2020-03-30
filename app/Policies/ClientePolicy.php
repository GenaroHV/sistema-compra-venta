<?php

namespace App\Policies;

use App\Cliente;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Administrador')) {
            return true;
        }
    }

    public function view(User $user, Cliente $cliente)
    {
        return $user->id === $product->user_id || $user->hasPermissionTo('Ver Cliente');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Cliente');
    }

    public function update(User $user, Cliente $cliente)
    {
        return $user->id === $product->user_id || $user->hasPermissionTo('Editar Cliente');
    }

    public function delete(User $user, Cliente $cliente)
    {
        return $user->id === $product->user_id || $user->hasPermissionTo('Eliminar Cliente');
    }
}
