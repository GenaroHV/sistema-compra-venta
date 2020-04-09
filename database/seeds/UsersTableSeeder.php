<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Permission::truncate();
        User::truncate();

        $administradorRole = Role::create(["name" => "Administrador"]);
        $vendedordorRole = Role::create(["name" => "Vendedor"]);

        $verUsuarioPermission = Permission::create(['name' => 'Ver Usuario']);
        $crearUsuarioPermission = Permission::create(['name' => 'Crear Usuario']);
        $editarUsuarioPermission = Permission::create(['name' => 'Editar Usuario']);
        $eliminarUsuarioPermission = Permission::create(['name' => 'Eliminar Usuario']);

        $verCategoriaPermission = Permission::create(['name' => 'Ver Categoria']);
        $crearCategoriaPermission = Permission::create(['name' => 'Crear Categoria']);
        $editarCategoriaPermission = Permission::create(['name' => 'Editar Categoria']);
        $eliminarCategoriaPermission = Permission::create(['name' => 'Eliminar Categoria']);

        $verProductoPermission = Permission::create(['name' => 'Ver Producto']);
        $crearProductoPermission = Permission::create(['name' => 'Crear Producto']);
        $editarProductoPermission = Permission::create(['name' => 'Editar Producto']);
        $eliminarProductoPermission = Permission::create(['name' => 'Eliminar Producto']);

        $verCompraPermission = Permission::create(['name' => 'Ver Compra']);
        $crearCompraPermission = Permission::create(['name' => 'Crear Compra']);

        $verProveedorPermission = Permission::create(['name' => 'Ver Proveedor']);
        $crearProveedorPermission = Permission::create(['name' => 'Crear Proveedor']);
        $editarProveedorPermission = Permission::create(['name' => 'Editar Proveedor']);
        $eliminarProveedorPermission = Permission::create(['name' => 'Eliminar Proveedor']);

        $verVentaPermission = Permission::create(['name' => 'Ver Venta']);
        $crearVentaPermission = Permission::create(['name' => 'Crear Venta']);

        $verClientePermission = Permission::create(['name' => 'Ver Cliente']);
        $crearClientePermission = Permission::create(['name' => 'Crear Cliente']);
        $editarClientePermission = Permission::create(['name' => 'Editar Cliente']);
        $eliminarClientePermission = Permission::create(['name' => 'Eliminar Cliente']);

        $admin = new User;
        $admin->name = "Genaro Hernández";
        $admin->username = "genaro.hernandez";
        $admin->email = "genaro@mail.com";  
        $admin->password = '654321';
        $admin->save();
        $admin->assignRole($administradorRole);
        
        $vendedor = new User;
        $vendedor->name = "Jhordy Benites";
        $vendedor->username = "jhordy.benites";
        $vendedor->email = "jhordy@mail.com";
        $vendedor->password = '123456';
        $vendedor->save();
        $vendedor->assignRole($administradorRole);


    }
}
