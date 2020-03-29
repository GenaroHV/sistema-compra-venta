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
        return view('admin.principal', compact('categoria', 'producto', 'cliente', 'proveedor', 'compra_registrado', 'compra_anulado','venta_registrado', 'venta_anulado'));
    }
    public function configurar(){
        $user = User::all();
        $role = Role::all();
        $permission = Permission::all();
        return view('admin.configurar', compact('user','role','permission'));
    }
}
