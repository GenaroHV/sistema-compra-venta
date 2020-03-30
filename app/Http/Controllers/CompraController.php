<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Compra;
use App\DetalleCompra;
use App\Proveedor;
use App\Product;
use App\User;
use Carbon\Carbon;
use PDF;
use App\Http\Requests\CompraFormRequest;
use App\Notifications\NotifyAdmin;

class CompraController extends Controller
{
    public function index(){
        $compra = Compra::allowed()->get();
        $compras = Compra::join('proveedores', 'compras.proveedor_id', '=', 'proveedores.id')
        ->join('users', 'compras.user_id', '=', 'users.id')
        ->select('compras.id', 'compras.tipo_comprobante', 'compras.serie_comprobante', 
                'compras.numero_comprobante', 'compras.fecha_hora', 'compras.impuesto', 
                'compras.total', 'compras.estado', 'proveedores.nombre as proveedor', 'users.name')
        ->get();
        return view('admin.modulo-compras.compras.index', compact('compras','compra'));
    } 

    public function create(){
        $tipo_comprobante = ['BOLETA', 'FACTURA', 'TICKET'];
        $this->authorize('create', new Compra);
        $proveedores = Proveedor::all();
        $compras = Compra::all();
        $productos = Product::all();
        return view('admin.modulo-compras.compras.create', compact('compras', 'proveedores', 'productos', 'tipo_comprobante'));
    }

    public function store(CompraFormRequest $request){
        $this->authorize('create', new Compra);
        try {
            DB::beginTransaction();
            $compra = new Compra;
            $compra->proveedor_id = $request->get('proveedor_id');
            $compra->user_id = \Auth::user()->id;
            $compra->tipo_comprobante = $request->get('tipo_comprobante');
            $compra->serie_comprobante = $request->get('serie_comprobante');
            $compra->numero_comprobante = $request->get('numero_comprobante');
            $compra->fecha_hora = Carbon::now()->toDateTimeString();
            $compra->impuesto = '0.18';
            $compra->total = $request->get('total_pagar');
            $compra->estado = 'Registrado';
            $compra->save();

            $producto_id=$request->get('producto_id');
            $cantidad=$request->get('cantidad');
            $precio=$request->get('precio');

            $cont=0;
     
            while($cont < count($producto_id)){

                $detalle = new DetalleCompra();
                $detalle->compra_id = $compra->id;
                $detalle->producto_id = $producto_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio = $precio[$cont];    
                $detalle->save();
                $cont=$cont+1;
            }
            $fechaActual = date('Y-m-d');
            $numVentas = DB::table('ventas')->whereDate('created_at', $fechaActual)->count();
            $numCompras = DB::table('compras')->whereDate('created_at', $fechaActual)->count();

            $arregloDatos = [
                'ventas' => [
                        'numero'    => $numVentas,
                        'mensaje'   => 'Ventas'
                        ],
                'compras' => [
                        'numero'    => $numCompras,
                        'mensaje'   => 'Compras'
                        ]
            ];
            $allUsers = User::all();
            foreach ($allUsers as $notificar) {
                User::findOrFail($notificar->id)->notify(new NotifyAdmin($arregloDatos));
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('admin.compras.index')->with('flash', 'Compra creado con éxito');
    }
    
    public function show(Compra $compra, $id){
        $this->authorize('view', $compra);
        $compra = DB::table('compras as c')
        ->join('proveedores as p', 'c.proveedor_id', '=', 'p.id')
        ->join('detalle_compras as dc', 'c.id', '=', 'dc.compra_id')
        ->select('c.id', 'c.fecha_hora', 'p.nombre', 'c.tipo_comprobante', 
            'c.serie_comprobante', 'c.numero_comprobante', 'c.impuesto', 'c.estado', 
            DB::raw('sum(dc.cantidad*precio) as total'))
        ->where('c.id', '=', $id)
        ->groupBy('c.id', 'c.tipo_comprobante', 'c.numero_comprobante',
            'c.fecha_hora', 'c.impuesto', 'c.estado','p.nombre')
        ->first();
        
        $detalles = DB::table('detalle_compras as d')
        ->join('products as p', 'd.producto_id', '=', 'p.id')
        ->select('p.nombre as producto', 'd.cantidad', 'd.precio')
        ->where('d.compra_id', '=', $id)
        ->get();
        
        return view('admin.modulo-compras.compras.show',['compra' => $compra,'detalles' =>$detalles]);
    }

    public function print(Compra $compra, $id){
        $this->authorize('view', $compra);
        $compra = DB::table('compras as c')
        ->join('proveedores as p', 'c.proveedor_id', '=', 'p.id')
        ->join('detalle_compras as dc', 'c.id', '=', 'dc.compra_id')
        ->select('c.id', 'c.fecha_hora', 'p.nombre', 'c.tipo_comprobante', 
            'c.serie_comprobante', 'c.numero_comprobante', 'c.impuesto', 'c.estado', 
            DB::raw('sum(dc.cantidad*precio) as total'))
        ->where('c.id', '=', $id)
        ->groupBy('c.id', 'c.tipo_comprobante', 'c.numero_comprobante',
            'c.fecha_hora', 'c.impuesto', 'c.estado','p.nombre')
        ->first();
        
        $detalles = DB::table('detalle_compras as d')
        ->join('products as p', 'd.producto_id', '=', 'p.id')
        ->select('p.nombre as producto', 'd.cantidad', 'd.precio')
        ->where('d.compra_id', '=', $id)
        ->get();
        
        return view('admin.modulo-compras.compras.print',['compra' => $compra,'detalles' =>$detalles]);
    }

    public function destroy($id){
        $compra = Compra::findOrFail($id);
        $this->authorize('delete', $compra);
        $compra->estado = 'Anulado';
        $compra->save();
    
        return redirect()->route('admin.compras.index')->with('flash', 'Compra anulada con éxito');
    }

    public function exportPdf(Compra $compra, $id){
        $this->authorize('view', $compra);       
        $compra = DB::table('compras as c')
        ->join('proveedores as p', 'c.proveedor_id', '=', 'p.id')
        ->join('detalle_compras as dc', 'c.id', '=', 'dc.compra_id')
        ->select('c.id', 'c.fecha_hora', 'p.nombre', 'c.tipo_comprobante', 
            'c.serie_comprobante', 'c.numero_comprobante', 'c.impuesto', 'c.estado', 
            DB::raw('sum(dc.cantidad*precio) as total'))
        ->where('c.id', '=', $id)
        ->groupBy('c.id', 'c.tipo_comprobante', 'c.numero_comprobante',
            'c.fecha_hora', 'c.impuesto', 'c.estado','p.nombre')
        ->first();        
        $detalles = DB::table('detalle_compras as d')
        ->join('products as p', 'd.producto_id', '=', 'p.id')
        ->select('p.nombre as producto', 'd.cantidad', 'd.precio')
        ->where('d.compra_id', '=', $id)
        ->get();
        $nombre = "COMPRA N° ".str_pad($compra->id, 3,'0', STR_PAD_LEFT) . '-'. date("Y") . '-JS';
        $pdf = PDF::loadView('admin.modulo-compras.compras.pdf', compact('compra', 'detalles'));
        return $pdf->download("$nombre.pdf");
    }
}
