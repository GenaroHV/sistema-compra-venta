<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Venta;
use App\DetalleVenta;
use App\Cliente;
use App\Product;
use Carbon\Carbon;
use PDF;

class VentaController extends Controller
{
    public function index(){
        $ventas = Venta::join('clientes', 'ventas.cliente_id', '=', 'clientes.id')
        ->join('users', 'ventas.user_id', '=', 'users.id')
        #->join('detalle_ventas as dv', 'ventas.id', '=', 'dv.venta_id')
        ->select('ventas.id', 'ventas.tipo_comprobante', 'ventas.serie_comprobante', 
                'ventas.numero_comprobante', 'ventas.fecha_hora', 'ventas.impuesto', 
                'ventas.estado', 'ventas.total', 'clientes.nombre as cliente', 'users.name')
        ->get();
        return view('admin.ventas.index', compact('ventas'));
    }

    public function create(){
        $tipo_comprobante = ['BOLETA', 'FACTURA', 'TICKET'];
        $clientes = Cliente::all();
        #$ventas = Venta::all();
        #$productos = Product::all();
        $productos = DB::table('products as p')
        ->join('detalle_compras as dc', 'p.id', '=', 'dc.producto_id')
        ->select(DB::raw('CONCAT(p.codigo, " ", p.nombre) AS producto'), 'p.id', 'p.stock', 'p.precio')
        #->where('p.condicion', '=', '1')
        ->where('p.stock', '>', '0')
        ->groupBy('producto', 'p.id', 'p.stock')
        ->get();
        return view('admin.ventas.create', compact('clientes', 'productos', 'tipo_comprobante'));
    }

    public function store(Request $request){
        
        try {
            DB::beginTransaction();
            $venta = new Venta;
            $venta->cliente_id = $request->get('cliente_id');
            $venta->user_id = \Auth::user()->id;
            $venta->tipo_comprobante = $request->get('tipo_comprobante');
            $venta->serie_comprobante = $request->get('serie_comprobante');
            $venta->numero_comprobante = $request->get('numero_comprobante');
            $venta->fecha_hora = Carbon::now()->toDateTimeString();
            $venta->impuesto = '0.18';
            $venta->total = $request->get('total_pagar');
            $venta->estado = 'Registrado';
            $venta->save();

            $producto_id=$request->get('producto_id');
            $cantidad=$request->get('cantidad');
            $precio=$request->get('precio');

            $cont=0;
     
            while($cont < count($producto_id)){

                $detalle = new DetalleVenta();
                $detalle->venta_id = $venta->id;
                $detalle->producto_id = $producto_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio = $precio[$cont];    
                $detalle->save();
                $cont=$cont+1;
            }
             DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.ventas.index')->with('flash', 'Venta realizada con éxito');
    }

    public function destroy($id){
        $venta = Venta::findOrFail($id);
        $venta->estado = 'Anulado';
        $venta->save();
    
        return redirect()->route('admin.ventas.index')->with('flash', 'Venta anulada con éxito');
    }
    
}
