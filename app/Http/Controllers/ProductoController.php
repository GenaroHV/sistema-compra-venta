<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Exports\ProductosExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ProductoController extends Controller
{
    public function index(){
        $productos = Product::allowed()->get();
        $model = new Product;
        $categorias = Category::all();
        return view('admin.modulo-almacen.productos.index', compact('productos', 'model', 'categorias'));
    }

    public function show(Product $product, $id){
        $this->authorize('view', $product);
        $producto = Product::find($id);
        return view('admin.modulo-almacen.productos.show', compact('producto'));
    }

    public function create(){
        $this->authorize('create', new Product);
        $categorias = Category::all();
        return view('admin.modulo-almacen.productos.create', compact('categorias'));
    }

    public function store(ProductoFormRequest $request){
        $this->authorize('create', new Product);

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

    public function edit($id){
        $producto = Product::findOrFail($id);
        $this->authorize('update', $producto);
        $categorias = Category::all();
        return view('admin.modulo-almacen.productos.edit', compact('producto', 'categorias'));
    }

    public function update(ProductoFormRequest $request, $id){
        $producto = Product::findOrFail($id);
        $this->authorize('update', $producto);
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

    public function destroy($id){
        $producto = Product::findOrFail($id);
        $this->authorize('delete', $producto);
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('flash', 'Producto eliminado con éxito');
    }

    public function excel(){
        return Excel::download(new ProductosExport, 'Reporte de Productos.xlsx');
    }

    public function pdf(){
        $productos = Product::all();
        $pdf = PDF::loadView('admin.modulo-almacen.productos.pdf', compact('productos'));
        return $pdf->download("Reporte de productos.pdf");
    }
}
