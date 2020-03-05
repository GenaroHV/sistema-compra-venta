<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        #$this->authorize('create', new User);
        $user = new User;
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.usuarios.create', compact('user', 'roles', 'permissions'));
    }

    public function store(Request $request)
    {
        #$this->authorize('create', new User);
        # Validamos
        $data = $request->validate([
            'name'  =>  'required|max:255',
            'email' =>  'required|email|max:255|unique:users'
        ]);
        # Creamos el usuario
        $user = User::create($data);
        // Asignar roles
        if($request->filled('roles'))
        {
            $user->assignRole($request->roles);
        }
        // Asignar permisos
        if($request->filled('permissions'))
        {
            $user->givePermissionTo($request->permissions);
        }
       // Regresamos al usuario
       return redirect()->route('admin.usuarios.index')->withFlash('Usuario creado con éxito');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.usuarios.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        #$this->authorize('update', $usuario);
        return view('admin.usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        #$this->authorize('update', $user);
        if($request->file('avatar') !== null){
            $user->avatar = optional($request->file('avatar'))->store('avatars','public');
        }
        
        $user->update($request->validated());
        return redirect()->route('admin.usuarios.edit', $user)->withFlash('Usuario actualizado con éxito');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        #$this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('admin.usuarios.index')->withFlash('Usuario eliminado con éxito');
    }
}
