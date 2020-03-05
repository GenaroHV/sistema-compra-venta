<?php

namespace App\Policies;

use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Administrador')) {
            return true;
        }
    }

    public function view(User $user, Category $category)
    {
        return $user->id === $category->user_id || $user->hasPermissionTo('Ver Categoria');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Categoria');
    }

    public function update(User $user, Category $category)
    {
        return $user->id === $category->user_id || $user->hasPermissionTo('Editar Categoria');
    }

    public function delete(User $user, Category $category)
    {
        return $user->id === $category->user_id || $user->hasPermissionTo('Eliminar Categoria');
    }
}
