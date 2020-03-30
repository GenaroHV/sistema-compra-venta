<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Movement;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoFormRequest;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    # Listar Producto
    public function index(){
        $productos = Product::all();
        return view('admin.modulo-almacen.productos.index', compact('productos'));
    }

    # Ver un producto
    public function show($id){
        $producto = Product::findOrFail($id);
        return view('admin.modulo-almacen.productos.show', compact('producto'));
    }

    # Ir a formulario de crear
    public function create(){
        $categorias = Category::all();
        return view('admin.modulo-almacen.productos.create', compact('categorias'));
    }

    # Grabar los datos del formulario crear
    public function store(ProductoFormRequest $request){
        

        $producto = new Product;
        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->precio = $request->get('precio');
        if($request->file('avatar') !== null){
            $producto->avatar = optional($request->file('avatar'))->store('img/productos','public');
        }
        $producto->descripcion = $request->get('descripcion');
        $producto->save();
        $producto->categorias()->sync($request->get('categorias'));
        return redirect()->route('admin.productos.index')->with('flash', 'Producto creado con éxito');
    }

    # Ir a formulario de editar
    public function edit($id){
        $producto = Product::findOrFail($id);
        $categorias = Category::all();
        return view('admin.modulo-almacen.productos.edit', compact('producto', 'categorias'));
    }

    # Grabar los datos del formulario editar
    public function update(ProductoFormRequest $request, $id){
        $producto = Product::findOrFail($id);
        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->precio = $request->get('precio');
        $producto->descripcion = $request->get('descripcion');
        if($request->file('avatar') !== null){
            $producto->avatar = optional($request->file('avatar'))->store('img/productos','public');
        }
        $producto->save();
        $producto->categorias()->sync($request->get('categorias'));
        return redirect()->route('admin.productos.index')->with('flash', 'Producto actualizado con éxito');
    }

    # Eliminar un producto
    public function destroy($id){
        $producto = Product::findOrFail($id);
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('flash', 'Producto eliminado con éxito');
    }
}
