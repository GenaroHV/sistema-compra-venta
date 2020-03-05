<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware'    => 'auth'
],
    function(){
        Route::get('/', 'AdminController@index');
        Route::resource('categorias', 'CategoriaController', ['except' => 'show']);
        Route::resource('usuarios', 'UserController');

        Route::resource('productos', 'ProductoController');
        Route::get('productos/incrementar/{id}', 'ProductoController@incrementar')->name('productos.incrementar');
        Route::put('productos/incrementar/{id}', 'ProductoController@actualizarIncremento')->name('productos.incrementar');

        Route::get('productos/disminuir/{id}', 'ProductoController@disminuir')->name('productos.disminuir');
        Route::put('productos/disminuir/{id}', 'ProductoController@actualizarDisminucion')->name('productos.disminuir');

        Route::resource('clientes', 'ClienteController');

        Route::resource('ingresos', 'IngresoController');
        #Route::get('ingresos/desactivar/{id}', 'IngresoController@desactivar')->name('ingresos.desactivar');
        Route::put('ingresos/desactivar/{id}', 'IngresoController@desactivar')->name('ingresos.desactivar');
        
        Route::resource('proveedores', 'ProveedorController');
        Route::resource('ventas', 'VentaController');
        
    }
);