<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cliente;
use App\Proveedor;
use App\User;
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
        $categoria = Category::all();
        $producto = Product::all();
        $cliente = Cliente::all();
        $proveedor = Proveedor::all();
        return view('admin.principal', compact('categoria', 'producto', 'cliente', 'proveedor'));
    }
    public function configurar(){
        $user = User::all();
        $role = Role::all();
        $permission = Permission::all();
        return view('admin.configurar', compact('user','role','permission'));
    }
}
