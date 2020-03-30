<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Http\Requests\ProveedorFormRequest;

class ProveedorController extends Controller
{
    public function index(){
        $proveedores = Proveedor::allowed()->get();
        return view('admin.modulo-compras.proveedores.index', compact('proveedores'));
    }

    public function create(){
        $tipo_documento = ['DNI', 'RUC', 'PASS'];
        $this->authorize('create', new Proveedor);
        return view('admin.modulo-compras.proveedores.create', compact('tipo_documento'));
    }

    public function store(ProveedorFormRequest $request){
        $this->authorize('create', new Proveedor);
        $proveedor = new Proveedor;
        $proveedor->nombre = $request->get('nombre');
        $proveedor->tipo_documento = $request->get('tipo_documento');
        $proveedor->numero_documento = $request->get('numero_documento');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->save();

        return redirect()->route('admin.proveedores.index')->with('flash', 'Proveedor creado con éxito');
    }

    public function edit($id){
        $tipo_documento = ['DNI', 'RUC', 'PASS'];
        $proveedor = Proveedor::findOrFail($id);
        $this->authorize('update', $proveedor);
        return view('admin.modulo-compras.proveedores.edit', compact('proveedor', 'tipo_documento'));
    }

    public function update(ProveedorFormRequest $request, $id){
        $proveedor = Proveedor::findOrFail($id);
        $this->authorize('update', $proveedor);
        $proveedor->nombre = $request->get('nombre');
        $proveedor->tipo_documento = $request->get('tipo_documento');
        $proveedor->numero_documento = $request->get('numero_documento');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->save();

        return redirect()->route('admin.proveedores.index')->with('flash', 'Proveedor actualizado con éxito');
    }

    public function destroy($id){
        $proveedor = Proveedor::findOrFail($id);
        $this->authorize('delete', $proveedor);
        $proveedor->delete();
        return redirect()->route('admin.proveedores.index')->with('flash', 'Proveedor eliminado con éxito');
    }
}
