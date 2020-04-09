<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaFormRequest;
use App\Exports\CategoriasExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Category::allowed()->get();
        $model = new Category;
        return view('admin.modulo-almacen.categorias.index', compact('categorias', 'model'));
    }    

    public function store(CategoriaFormRequest $request){
        $this->authorize('create', new Category);
        $categoria = new Category;
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->save();
        return redirect()->route('admin.categorias.index')->with('flash', 'Categoria creada con éxito');
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

    public function excel(){
        return Excel::download(new CategoriasExport, 'Reporte de Categorías.xlsx');
    }

    public function pdf(){
        $categorias = Category::all();
        $pdf = PDF::loadView('admin.modulo-almacen.categorias.pdf', compact('categorias'));
        return $pdf->download("Reporte de categorias.pdf");
    }
}
