<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.usuarios.index', compact('users'));
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
       return redirect()->route('admin.users.index')->withFlash('Usuario creado con éxito');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.usuarios.show', compact('user'));
    }

    public function edit(User $user)
    {
        #$user = User::findOrFail($id);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        #$this->authorize('update', $usuario);
        return view('admin.usuarios.edit', compact('user', 'roles','permissions'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        #$this->authorize('update', $user);
        if($request->file('avatar') !== null){
            $user->avatar = optional($request->file('avatar'))->store('avatars','public');
        }
        
        $user->update($request->validated());
        return redirect()->route('admin.users.edit', $user)->withFlash('Usuario actualizado');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        #$this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('admin.users.index')->withFlash('Usuario eliminado con éxito');
    }
}
