<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index(){
        #$this->authorize('view', new Permission);
        return view('admin.permisos.index', ['permissions' => Permission::all()]);
    }

    public function edit(Permission $permission){
        #$this->authorize('update', $permission);
        return view('admin.permisos.edit', [
            'permission'    => $permission
        ]);
    }
    public function update(Request $request, Permission $permission){
        #$this->authorize('update', $permission);
        $data = $request->validate(['guard_name' => 'required']);
        $permission->update($data);
        return redirect()->route('admin.permisos.edit', $permission)->withFlash('El permiso ha sido actualizado');
    }
}
