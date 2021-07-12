<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false, 'reset' => false]);

# RUTAS API

Route::group([
    'prefix' => 'api',
    'middleware'    => 'auth'
], 
    function(){
        Route::get('categorias', 'Api\ApiController@categorias')->name('api.categorias.index');
        Route::get('productos', 'Api\ApiController@productos')->name('api.productos.index');
});

# RUTAS WEB ADMIN

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware'    => 'auth'
],
    function(){
        Route::get('/', 'AdminController@index');
        Route::get('configurar', 'AdminController@configurar')->name('configurar');
        // Empresa
        Route::resource('empresa', 'EmpresaController')->only(['index', 'update']);
        // Usuarios
        Route::resource('users', 'UserController');
        // Roles
        Route::resource('roles', 'RolesController')->except(['show']);
        // Permisos
        Route::resource('permissions', 'PermissionsController')->only(['index', 'edit', 'update']);
        // Actualizar Roles de Usuario y Permisos de Usuario
        Route::middleware('role:Administrador')->put('users/{user}/roles', 'UsersRolesController@update')->name('users.roles.update');
        Route::middleware('role:Administrador')->put('users/{user}/permissions', 'UsersPermissionsController@update')->name('users.permissions.update');
        // Categorias y Productos
        Route::resource('categorias', 'CategoriaController')->except(['show']);
        Route::get('categorias/excel', 'CategoriaController@excel')->name('categorias.excel');
        Route::get('categorias/pdf', 'CategoriaController@pdf')->name('categorias.pdf');
        Route::resource('productos', 'ProductoController')->except(['show', 'edit', 'create']);
        Route::get('productos/excel', 'ProductoController@excel')->name('productos.excel');
        Route::get('productos/pdf', 'ProductoController@pdf')->name('productos.pdf');
        // Proveedores y Compras
        Route::resource('proveedores', 'ProveedorController');        
        Route::resource('compras', 'CompraController');
        Route::get('compras/{id}/print', 'CompraController@print')->name('compras.print');
        Route::get('compras/{id}/export', 'CompraController@exportPdf')->name('compras.pdf');        
        // Clientes y Ventas
        Route::resource('clientes', 'ClienteController');
        Route::resource('ventas', 'VentaController');
        Route::get('ventas/{id}/print', 'VentaController@print')->name('ventas.print');
        Route::get('ventas/{id}/export', 'VentaController@exportPdf')->name('ventas.pdf');
        // Notificaciones
        Route::post('notification/get', 'NotificationController@get');
    }
);