<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cliente;
use App\Proveedor;
use App\User;
use App\Compra;
use App\Venta;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Use DB;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categoria = Category::count();
        $producto = Product::count();
        $cliente = Cliente::count();
        $proveedor = Proveedor::count();
        $venta_registrado = Venta::where('estado','=','Registrado')->count();
        $venta_anulado = Venta::where('estado','=','Anulado')->count();
        $compra_registrado = Compra::where('estado','=','Registrado')->count();
        $compra_anulado = Compra::where('estado','=','Anulado')->count();

        $comprasanual=DB::select('SELECT DATE_FORMAT(c.fecha_hora, "%m/%d/%Y") as anual, sum(c.total) as totalanual from compras c where c.estado="Registrado" group by YEAR(c.fecha_hora) order by YEAR(c.fecha_hora)');
        $ventasanual=DB::select('SELECT DATE_FORMAT(v.fecha_hora, "%m/%d/%Y") as anual, sum(v.total) as totalanual from ventas v where v.estado="Registrado" group by YEAR(v.fecha_hora) order by YEAR(v.fecha_hora)');
        $comprasmes=DB::select('SELECT monthname(c.fecha_hora) as mes, sum(c.total) as totalmes from compras c where c.estado="Registrado" group by monthname(c.fecha_hora) order by month(c.fecha_hora) desc limit 12');
        $ventasmes = DB::select('SELECT monthname(v.fecha_hora) as mes, sum(v.total) as totalmes from ventas v where v.estado="Registrado"  group by monthname(v.fecha_hora) order by month(v.fecha_hora) desc limit 12');
        $comprasdia = DB::select('SELECT DATE_FORMAT(c.fecha_hora, "%m/%d/%Y") as dia, sum(c.total) as totaldia from compras c where c.estado="Registrado" group by c.fecha_hora order by day(c.fecha_hora) limit 15');
        $ventasdia = DB::select('SELECT DATE_FORMAT(v.fecha_hora, "%m/%d/%Y") as dia, sum(v.total) as totaldia from ventas v where v.estado="Registrado" group by v.fecha_hora order by day(v.fecha_hora) limit 15');
        #$productosvendidos = DB::select('SELECT p.nombre as producto, sum(dv.cantidad) as cantidad from products p inner join detalle_ventas dv on p.id=dv.producto_id inner join ventas v on dv.venta_id=v.id where v.estado="Registrado" and year(v.fecha_hora)=year(curdate()) group by p.nombre order by sum(dv.cantidad) desc limit 10');
        $totales = DB::select('SELECT (select ifnull(sum(c.total),0) from compras c where DATE (c.fecha_hora)=curdate() and c.estado="Registrado") as totalcompra, (select ifnull(sum(v.total),0) from ventas v where DATE(v.fecha_hora)=curdate() and v.estado="Registrado") as totalventa');
        #ddd($comprasanual);
        return view('admin.principal', compact('categoria', 'producto', 'cliente', 'proveedor', 'compra_registrado', 'compra_anulado','venta_registrado', 'venta_anulado', 'comprasmes', 'ventasmes', 'ventasdia','comprasdia','totales','comprasanual','ventasanual'));
    }
    public function configurar(){

        return view('admin.configurar');
    }
}
