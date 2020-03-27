<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    public function create(){
        $tipo_documento = ['DNI', 'RUC', 'PASS'];
        return view('admin.clientes.create', compact('tipo_documento'));
    }

    public function store(Request $request){
        $cliente = new Cliente;
        $cliente->nombre = $request->get('nombre');
        $cliente->tipo_documento = $request->get('tipo_documento');
        $cliente->numero_documento = $request->get('numero_documento');
        $cliente->direccion = $request->get('direccion');
        $cliente->telefono = $request->get('telefono');
        $cliente->email = $request->get('email');
        $cliente->save();

        return redirect()->route('admin.clientes.index')->with('flash', 'Cliente creado con éxito');
    }

    public function edit($id){
        $tipo_documento = ['DNI', 'RUC', 'PASS'];
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente', 'tipo_documento'));
    }

    public function update(Request $request, $id){
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre = $request->get('nombre');
        $cliente->tipo_documento = $request->get('tipo_documento');
        $cliente->numero_documento = $request->get('numero_documento');
        $cliente->direccion = $request->get('direccion');
        $cliente->telefono = $request->get('telefono');
        $cliente->email = $request->get('email');
        $cliente->save();

        return redirect()->route('admin.clientes.index')->with('flash', 'Cliente actualizado con éxito');
    }

    public function destroy($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('flash', 'Cliente eliminado con éxito');
    }
}
