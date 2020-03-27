<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Venta;
use App\DetalleVenta;
use App\Persona;
use App\Product;
use Carbon\Carbon;
use PDF;

class VentaController extends Controller
{
    public function index(){
        $ventas = Venta::join('personas', 'ventas.persona_id', '=', 'personas.id')
        ->join('users', 'ventas.user_id', '=', 'users.id')
        ->select('ventas.id', 'ventas.tipo_comprobante', 'ventas.serie_comprobante', 
                'ventas.numero_comprobante', 'ventas.fecha_hora', 'ventas.impuesto', 
                'ventas.total', 'ventas.estado', 'personas.nombre', 'users.name')
        ->get();
        dd($ventas);
        return view('admin.ventas.index', compact('ventas'));
    }
}
