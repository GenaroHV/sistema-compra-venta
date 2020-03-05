<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    # Listar Producto
    public function index(){
        $productos = Product::all();
        return view('admin.productos.index', compact('productos'));
    }

    # Ver un producto
    public function show($id){
        $producto = Product::findOrFail($id);
        return view('admin.productos.show', compact('producto'));
    }

    # Ir a formulario de crear
    public function create(){
        $categorias = Category::all();
        return view('admin.productos.create', compact('categorias'));
    }

    # Grabar los datos del formulario crear
    public function store(Request $request){
        $this->validate($request, [
            'codigo' => 'required',
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $producto = new Product;
        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->precio = $request->get('precio');
        $producto->avatar = $request->file('avatar')->store('img/productos','public');
        $producto->descripcion = $request->get('descripcion');
        $producto->save();
        $producto->categorias()->sync($request->get('categorias'));
        return redirect()->route('admin.productos.index')->with('flash', 'Producto creado con éxito');
    }

    # Ir a formulario de editar
    public function edit($id){
        $producto = Product::findOrFail($id);
        $categorias = Category::all();
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    # Grabar los datos del formulario editar
    public function update(Request $request, $id){
        $this->validate($request, [
            'codigo' => 'required',
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
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

    # Ir a formulario de incremento
    public function incrementar($id){
        $producto = Product::findOrFail($id);
        return view('admin.productos.incrementar', compact('producto'));
    }

    # Grabar los datos del formulario de incremento
    public function actualizarIncremento(Request $request, $id)
    {
        $datos=$request->all();
        $datos['tipo']='ingreso';
        $datos['products_id']=$id;

        Movement::create($datos);

        $producto = Product::findOrFail($id);
        $producto->stock=$producto->stock + $request->cantidad;
        $producto->save();

        return redirect(route('admin.productos.index'))->with('flash', 'Stock incrementado con éxito');
    }

    # Ir a formulario de incremento
    public function disminuir($id){
        $producto = Product::findOrFail($id);
        return view('admin.productos.disminuir', compact('producto'));
    }

    # Grabar los datos del formulario de incremento
    public function actualizarDisminucion(Request $request, $id)
    {
        $datos=$request->all();
        $datos['tipo']='salida';
        $datos['products_id']=$id;

        $producto = Product::findOrFail($id);
        $producto->stock=$producto->stock - $request->cantidad;
        if($producto->stock>=0)
        {
            Movement::create($datos);
            $producto->save();
            return redirect(route('admin.productos.index'))->with('flash', 'Stock disminuido con éxito');
        }
        else
        {
            return Redirect::back();
        }
    }


}
