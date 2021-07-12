<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    public function index(){        
        $empresa = Empresa::all();
        return view('admin.modulo-admin.empresa.index', compact('empresa'));
    }

    public function update(Request $request, $id){
        $empresa = Empresa::findOrFail($id);
        $empresa->razon_social = $request->get('razon_social');
        $empresa->propietario = $request->get('propietario');
        $empresa->ruc = $request->get('ruc');
        $empresa->telefono = $request->get('telefono');
        $empresa->email = $request->get('email');
        $empresa->igv = $request->get('igv');
        $empresa->moneda = $request->get('moneda');
        if($request->file('logo') !== null){
            $empresa->logo = optional($request->file('logo'))->store('logo','public');
        }
        $empresa->save();
        #Storage::delete($empresa->logo);
        return redirect()->route('admin.empresa.index')->with('flash', 'Datos actualizados con éxito');
    }
}
