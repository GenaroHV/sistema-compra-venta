<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Category'  => 'App\Policies\CategoryPolicy',
        'App\Product'   => 'App\Policies\ProductoPolicy',
        'App\Compra'    => 'App\Policies\CompraPolicy',
        'App\Proveedor' => 'App\Policies\ProveedorPolicy',
        'App\Venta'     => 'App\Policies\VentaPolicy',
        'App\Cliente'   => 'App\Policies\ClientePolicy',
        'Spatie\Permission\Models\Role' => 'App\Policies\RolePolicy',
        'Spatie\Permission\Models\Permission' => 'App\Policies\PermissionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
