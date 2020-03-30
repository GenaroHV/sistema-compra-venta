<?php

namespace App\Policies;

use App\Proveedor;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProveedorPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Administrador')) {
            return true;
        }
    }

    public function view(User $user, Proveedor $proveedor)
    {
        return $user->id === $product->user_id || $user->hasPermissionTo('Ver Proveedor');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Proveedor');
    }

    public function update(User $user, Proveedor $proveedor)
    {
        return $user->id === $product->user_id || $user->hasPermissionTo('Editar Proveedor');
    }

    public function delete(User $user, Proveedor $proveedor)
    {
        return $user->id === $product->user_id || $user->hasPermissionTo('Eliminar Proveedor');
    }
}
