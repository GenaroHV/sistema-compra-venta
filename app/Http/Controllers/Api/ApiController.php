<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function categorias(){
        $model = Category::query()->allowed()->get();

        return datatables($model)
            ->addColumn('action', function($model){
                return view('admin.modulo-almacen.categorias.acciones', compact('model'))->render();
                })
            ->make(true);
    }

    public function productos(){
        $model = Product::query()->with('categorias')->allowed()->get();        
        return datatables($model)
            ->editColumn('categorias', function($model){
                return $model->categorias->map(function($categoria){
                    return $categoria->nombre;
                })->implode('<br>');
            })
            ->editColumn('avatar', function($model){
                return view('admin.modulo-almacen.productos.image', compact('model'));
            })
            ->addColumn('action', function($model){
                return view('admin.modulo-almacen.productos.acciones', compact('model'));
            })
            ->rawColumns(['categorias','avatar','action'])
            ->toJson();
    }

}
