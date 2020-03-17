<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index()
    {
        #$this->authorize('view', new Role);
        return view('admin.roles.index', ['roles' => Role::all()]); 
    }

    public function create()
    {
        #$this->authorize('create', $role = new Role);
        return view('admin.roles.create', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')            
        ]);
    }

    public function store(Request $request)
    {
        #$this->authorize('create', new Role);
        $data = $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required',
            'guard_name' => 'required'
        ],[
            'name.required' => 'El campo identificador es obligatorio',
            'name.unique' => 'Este identificador ya ha sido registrado',
            'display_name.required' => 'El campo nombre es obligatorio',
            'guard_name.required' => 'El campo nombre de guardia es obligatorio'
        ]);

        $role = Role::create($data);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index', $role)->withFlash('El rol fue creado correctamente');
    }

    public function edit(Role $role)
    {
        #$this->authorize('update', $role);
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    public function update(Request $request, Role $role)
    {
        #$this->authorize('update', $role);
        $data = $request->validate([
            'display_name' => 'required',
            'guard_name' => 'required'
        ],[
            'display_name.required' => 'El campo nombre es obligatorio',
            'guard_name.required' => 'El campo nombre de guardia es obligatorio'
        ]);

        $role->update($data);
        $role->permissions()->detach();

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.edit', $role)->withFlash('El rol fue actualizado correctamente');
    }

    public function destroy(Role $role)
    {
        #$this->authorize('delete', $role);
        $role->delete();
        return redirect()->route('admin.roles.index')->withFlash('El role fue eliminado correctamente');
    }
}
