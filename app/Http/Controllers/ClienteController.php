<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClienteFormRequest;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::allowed()->get();
        return view('admin.modulo-ventas.clientes.index', compact('clientes'));
    }

    public function create(){
        #$tipo_documento = ['DNI', 'RUC', 'PASS'];
        $this->authorize('create', new Cliente);
        #return view('admin.modulo-ventas.clientes.create', compact('tipo_documento'));
        return view('admin.modulo-ventas.clientes.create');
    }

    public function store(ClienteFormRequest $request){
        $this->authorize('create', new Cliente);
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
        $this->authorize('update', $cliente);
        return view('admin.modulo-ventas.clientes.edit', compact('cliente', 'tipo_documento'));
    }

    public function update(ClienteFormRequest $request, $id){
        $cliente = Cliente::findOrFail($id);
        $this->authorize('update', $cliente);
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
        $this->authorize('delete', $cliente);
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('flash', 'Cliente eliminado con éxito');
    }
}
