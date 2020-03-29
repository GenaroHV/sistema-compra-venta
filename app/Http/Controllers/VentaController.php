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
        $productos = DB::table('products as p')
        ->join('detalle_compras as dc', 'p.id', '=', 'dc.producto_id')
        ->select(DB::raw('CONCAT(p.codigo, " ", p.nombre) AS producto'), 'p.id', 'p.stock', 'p.precio')
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

    public function show($id){
        $venta = DB::table('ventas as v')
        ->join('clientes as c', 'v.cliente_id', '=', 'c.id')
        ->join('detalle_ventas as dv', 'c.id', '=', 'dv.venta_id')
        ->select('v.id', 'v.fecha_hora', 'c.nombre', 'v.tipo_comprobante', 
            'v.serie_comprobante', 'v.numero_comprobante', 'v.impuesto', 'v.estado', 
            DB::raw('sum(dv.cantidad*precio) as total'))
        ->where('v.id', '=', $id)
        ->groupBy('v.id', 'v.tipo_comprobante', 'v.numero_comprobante',
            'v.fecha_hora', 'v.impuesto', 'v.estado','c.nombre')
        ->first();
        
        $detalles = DB::table('detalle_ventas as d')
        ->join('products as p', 'd.producto_id', '=', 'p.id')
        ->select('p.nombre as producto', 'd.cantidad', 'd.precio')
        ->where('d.venta_id', '=', $id)
        ->get();
        
        return view('admin.ventas.show',['venta' => $venta,'detalles' =>$detalles]);
    }

    public function print($id){
        $venta = DB::table('ventas as v')
        ->join('clientes as c', 'v.cliente_id', '=', 'c.id')
        ->join('detalle_ventas as dv', 'v.id', '=', 'dv.venta_id')
        ->select('v.id', 'v.fecha_hora', 'c.nombre', 'v.tipo_comprobante', 
            'v.serie_comprobante', 'v.numero_comprobante', 'v.impuesto', 'v.estado', 
            DB::raw('sum(dv.cantidad*precio) as total'))
        ->where('v.id', '=', $id)
        ->groupBy('v.id', 'v.tipo_comprobante', 'v.numero_comprobante',
            'v.fecha_hora', 'v.impuesto', 'v.estado','c.nombre')
        ->first();
        
        $detalles = DB::table('detalle_ventas as d')
        ->join('products as p', 'd.producto_id', '=', 'p.id')
        ->select('p.nombre as producto', 'd.cantidad', 'd.precio')
        ->where('d.venta_id', '=', $id)
        ->get();
        
        return view('admin.ventas.print',['venta' => $venta,'detalles' =>$detalles]);
    }

    public function destroy($id){
        $venta = Venta::findOrFail($id);
        $venta->estado = 'Anulado';
        $venta->save();
    
        return redirect()->route('admin.ventas.index')->with('flash', 'Venta anulada con éxito');
    }

    public function exportPdf($id){        
        $venta = DB::table('ventas as v')
        ->join('clientes as c', 'v.cliente_id', '=', 'c.id')
        ->join('detalle_ventas as dv', 'v.id', '=', 'dv.venta_id')
        ->select('v.id', 'v.fecha_hora', 'c.nombre', 'v.tipo_comprobante', 
            'v.serie_comprobante', 'v.numero_comprobante', 'v.impuesto', 'v.estado', 
            DB::raw('sum(dv.cantidad*precio) as total'))
        ->where('v.id', '=', $id)
        ->groupBy('v.id', 'v.tipo_comprobante', 'v.numero_comprobante',
            'v.fecha_hora', 'v.impuesto', 'v.estado','c.nombre')
        ->first();        
        $detalles = DB::table('detalle_ventas as d')
        ->join('products as p', 'd.producto_id', '=', 'p.id')
        ->select('p.nombre as producto', 'd.cantidad', 'd.precio')
        ->where('d.venta_id', '=', $id)
        ->get();
        $nombre = "VENTA N° ".str_pad($venta->id, 3,'0', STR_PAD_LEFT) . '-'. date("Y") . '-JS';
        $pdf = PDF::loadView('admin.ventas.pdf', compact('venta', 'detalles'));
        return $pdf->download("$nombre.pdf");
    }
    
}
