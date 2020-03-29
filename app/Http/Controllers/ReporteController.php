<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;

class ReporteController extends Controller
{
    public function index(){
        #database.php -> mysql -> 'strict' => false;

        $comprasmes=DB::select('SELECT monthname(c.fecha_hora) as mes, sum(c.total) as totalmes from compras c where c.estado="Registrado" group by monthname(c.fecha_hora) order by month(c.fecha_hora) desc limit 12');

        $ventasmes = DB::select('SELECT monthname(v.fecha_hora) as mes, sum(v.total) as totalmes from ventas v where v.estado="Registrado"  group by monthname(v.fecha_hora) order by month(v.fecha_hora) desc limit 12');

        $ventasdia = DB::select('SELECT DATE_FORMAT(v.fecha_hora, "%d/%m/%Y") as dia, sum(v.total) as totaldia from ventas v where v.estado="Registrado" group by v.fecha_hora order by day(v.fecha_hora) desc limit 15');

        $productosvendidos = DB::select('SELECT p.nombre as producto, sum(dv.cantidad) as cantidad from products p inner join detalle_ventas dv on p.id=dv.producto_id inner join ventas v on dv.venta_id=v.id where v.estado="Registrado" and year(v.fecha_hora)=year(curdate()) group by p.nombre order by sum(dv.cantidad) desc limit 10');

        $totales = DB::select('SELECT (select ifnull(sum(c.total),0) from compras c where DATE (c.fecha_hora)=curdate() and c.estado="Registrado") as totalcompra, (select ifnull(sum(v.total),0) from ventas v where DATE(v.fecha_hora)=curdate() and v.estado="Registrado") as totalventa');

        return view('admin.reportes.index', compact('comprasmes', 'ventasmes', 'ventasdia', 'productosvendidos', 'totales'));
    }
    
    public function ventas(){
        $productos = Product::all();
        return view('admin.reportes.ventas', compact('productos'));
    }    
}
