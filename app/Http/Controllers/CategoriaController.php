<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaFormRequest;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Category::allowed()->get();
        return view('admin.modulo-almacen.categorias.index', compact('categorias'));
    }

    public function create(){
        $this->authorize('create', new Category);
        return view('admin.modulo-almacen.categorias.create');
    }

    public function store(CategoriaFormRequest $request){
        $this->authorize('create', new Category);
        $categoria = new Category;
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->save();

        return redirect()->route('admin.categorias.index')->with('flash', 'Categoria creada con éxito');
    }

    public function edit($id){        
        $categoria = Category::findOrFail($id);
        $this->authorize('update', $categoria);
        return view('admin.modulo-almacen.categorias.edit', compact('categoria'));
    }

    public function update(CategoriaFormRequest $request, $id){
        $categoria = Category::findOrFail($id);
        $this->authorize('update', $categoria);
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->save();

        return redirect()->route('admin.categorias.index')->with('flash', 'Categoria actualizada con éxito');
    }

    public function destroy($id){
        $categoria = Category::findOrFail($id);
        $this->authorize('delete', $categoria);
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('flash', 'Categoria eliminada con éxito');
    }
}
