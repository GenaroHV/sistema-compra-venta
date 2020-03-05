<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
class ClienteController extends Controller
{
    public function index(){
        $personas = Persona::where('tipo_persona', '=', 'Cliente')->get();
        return view('admin.clientes.index', compact('personas'));
    }

    public function create(){
        $tipo_documento = ['DNI', 'RUC', 'PASS'];
        return view('admin.clientes.create', compact('tipo_documento'));
    }

    public function store(Request $request){
        $persona = new Persona;
        $persona->nombre = $request->get('nombre');
        $persona->tipo_persona = 'Cliente';
        $persona->tipo_documento = $request->get('tipo_documento');
        $persona->numero_documento = $request->get('numero_documento');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');
        $persona->save();

        return redirect()->route('admin.clientes.index')->with('flash', 'Cliente creada con éxito');
    }

    public function edit($id){
        $doc = ['DNI', 'RUC', 'PASS'];
        $persona = Persona::findOrFail($id);
        return view('admin.clientes.edit', compact('persona', 'doc'));
    }

    public function update(Request $request, $id){
        $persona = Persona::findOrFail($id);
        $persona->nombre = $request->get('nombre');
        $persona->tipo_documento = $request->get('tipo_documento');
        $persona->numero_documento = $request->get('numero_documento');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');
        $persona->save();

        return redirect()->route('admin.clientes.index')->with('flash', 'Cliente actualizado con éxito');
    }

    public function destroy($id){
        $persona = Persona::findOrFail($id);
        $persona->delete();
        return redirect()->route('admin.clientes.index')->with('flash', 'Cliente eliminado con éxito');
    }
}
