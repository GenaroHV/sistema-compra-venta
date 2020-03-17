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

        $verCategoriaPermission = Permission::create(['name' => 'Ver Categoria']);
        $crearCategoriaPermission = Permission::create(['name' => 'Crear Categoria']);
        $editarCategoriaPermission = Permission::create(['name' => 'Editar Categoria']);
        $eliminarCategoriaPermission = Permission::create(['name' => 'Eliminar Categoria']);

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
