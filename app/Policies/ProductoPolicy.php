<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Administrador')) {
            return true;
        }
    }

    public function view(User $user, Product $product)
    {
        return $user->id === $product->user_id || $user->hasPermissionTo('Ver Producto');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Producto');
    }

    public function update(User $user, Product $product)
    {
        return $user->id === $product->user_id || $user->hasPermissionTo('Editar Producto');
    }

    public function delete(User $user, Product $product)
    {
        return $user->id === $product->user_id || $user->hasPermissionTo('Eliminar Producto');
    }
}
