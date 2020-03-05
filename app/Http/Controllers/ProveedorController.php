<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Proveedor;
use App\Persona;
class ProveedorController extends Controller
{

    public function index(){
        $proveedores = Proveedor::join('personas', 'proveedores.id', '=', 'personas.id')
        ->select('personas.id', 'personas.nombre', 'personas.tipo_documento', 'personas.numero_documento', 'personas.direccion', 'personas.telefono', 'personas.email', 'proveedores.contacto', 'proveedores.telefono_contacto')
        ->get();
        return view('admin.proveedores.index', compact('proveedores'));
    }

    public function create(){
        $tipo_documento = ['DNI', 'RUC', 'PASS'];
        return view('admin.proveedores.create', compact('tipo_documento'));
    }

    public function store(Request $request){
        
        try {
            DB::beginTransaction();
            $persona = new Persona;
            $persona->nombre = $request->get('nombre');
            $persona->tipo_documento = $request->get('tipo_documento');
            $persona->tipo_persona = 'Proveedor';
            $persona->numero_documento = $request->get('numero_documento');
            $persona->direccion = $request->get('direccion');
            $persona->telefono = $request->get('telefono');
            $persona->email = $request->get('email');
            $persona->save();

            $proveedor = new Proveedor;
            $proveedor->contacto = $request->get('contacto');
            $proveedor->telefono_contacto = $request->get('telefono_contacto');
            $proveedor->id = $persona->id;
            $proveedor->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.proveedores.index')->with('flash', 'Proveedor creado con éxito');
    }

    public function edit($id){
        $doc = ['DNI', 'RUC', 'PASS'];
        $proveedor = Proveedor::join('personas', 'proveedores.id', '=', 'personas.id')
        ->select('personas.id', 'personas.nombre', 'personas.tipo_documento', 'personas.numero_documento', 'personas.direccion', 'personas.telefono', 'personas.email', 'proveedores.contacto', 'proveedores.telefono_contacto')
        ->findOrFail($id);
        return view('admin.proveedores.edit', compact('proveedor', 'doc'));
    }

    public function update(Request $request, $id){
        try {
            DB::beginTransaction();
            $persona = Persona::findOrFail($id);
            $proveedor = Proveedor::findOrFail($id);

            $persona->nombre = $request->get('nombre');
            $persona->tipo_documento = $request->get('tipo_documento');
            $persona->numero_documento = $request->get('numero_documento');
            $persona->direccion = $request->get('direccion');
            $persona->telefono = $request->get('telefono');
            $persona->email = $request->get('email');
            $persona->save();
            
            $proveedor->contacto = $request->get('contacto');
            $proveedor->telefono_contacto = $request->get('telefono_contacto');
            $proveedor->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.proveedores.index')->with('flash', 'Proveedor actualizado con éxito');
    }

    public function destroy($id){
        try {
            DB::beginTransaction();
            $persona = Persona::findOrFail($id);
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->delete();
            $persona->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }        
        return redirect()->route('admin.proveedores.index')->with('flash', 'Proveedor eliminado con éxito');
    }
}
