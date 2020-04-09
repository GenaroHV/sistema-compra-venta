<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
class EmpresaController extends Controller
{
    public function index(){
        $empresa = Empresa::all();
        return view('admin.modulo-admin.empresa.index', compact('empresa'));
    }
}
