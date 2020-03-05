<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ingreso;
use App\DetalleIngreso;
use App\Persona;
use App\Product;
use Carbon\Carbon;
class IngresoController extends Controller
{
    public function index(){
        $ingresos = Ingreso::join('personas', 'ingresos.proveedor_id', '=', 'personas.id')
        ->join('users', 'ingresos.user_id', '=', 'users.id')
        ->select('ingresos.id', 'ingresos.tipo_comprobante', 'ingresos.serie_comprobante', 
                'ingresos.numero_comprobante', 'ingresos.fecha_hora', 'ingresos.impuesto', 
                'ingresos.total', 'ingresos.estado', 'personas.nombre', 'users.name')
        ->get();
        #return $ingresos;
        return view('admin.ingresos.index', compact('ingresos'));
    } 

    public function create(){
        $personas = Persona::where('tipo_persona', '=', 'Proveedor')->get();
        $ingresos = Ingreso::all();
        $productos = Product::all();
        return view('admin.ingresos.create', compact('ingresos', 'personas', 'productos'));
    }

    public function store(Request $request){
        
        try {
            DB::beginTransaction();
            $ingreso = new Ingreso;
            $ingreso->proveedor_id = $request->get('proveedor_id');
            $ingreso->user_id = \Auth::user()->id;
            $ingreso->tipo_comprobante = $request->get('tipo_comprobante');
            $ingreso->serie_comprobante = $request->get('serie_comprobante');
            $ingreso->numero_comprobante = $request->get('numero_comprobante');
            $ingreso->fecha_hora = Carbon::now();
            $ingreso->impuesto = $request->get('impuesto');
            $ingreso->total = $request->get('total');
            $ingreso->estado = 'Registrado';
            $ingreso->save();

            $detalles = $request->data;

            foreach ($detalles as $ep=> $det) {
                $detalle = new DetalleIngreso;
                $detalle->ingreso_id = $ingreso->id;
                $detalle->producto_id = $det['producto_id'];
                $detalle->cantidad = $det['cantidad'];
                $detalle->precio = $det['precio'];
                $detalle->save();
             }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.ingresos.index')->with('flash', 'Ingreso creado con éxito');
    }

    public function desactivar($id){
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->estado = 'Anulado';
        $ingreso->save();
    
        return redirect()->route('admin.proveedores.index')->with('flash', 'Proveedor eliminado con éxito');
    }
}
