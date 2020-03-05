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
        $admin->email = "genaro@mail.com";
        $admin->password = bcrypt('654321');
        $admin->avatar = "img/users/administrador.jpg";
        $admin->save();
        $admin->assignRole($administradorRole);
        
        $vendedor = new User;
        $vendedor->name = "Jhordy Benites";
        $vendedor->email = "jhordy@mail.com";
        $vendedor->password = bcrypt('123456');
        $vendedor->avatar = "img/users/user-default.png";
        $vendedor->save();
        $vendedor->assignRole($administradorRole);


    }
}
