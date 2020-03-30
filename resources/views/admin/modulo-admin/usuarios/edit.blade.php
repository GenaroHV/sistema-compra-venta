@extends('layouts.app')
@section('titulo', 'Editar Usuario')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6 ml-auto mr-auto">
                    <h1 class="m-0 text-dark text-center">Editar Usuario</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">         
            <div class="row justify-content-center">
                <div class="col-12 col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                          <ul class="nav nav-pills">                            
                            <li class="nav-item"><a class="nav-link active" href="#usuario" data-toggle="tab">Usuario</a></li>
                            <li class="nav-item"><a class="nav-link" href="#rol" data-toggle="tab">Roles</a></li>
                            <li class="nav-item"><a class="nav-link" href="#permiso" data-toggle="tab">Permisos</a></li>
                          </ul>
                        </div>
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="usuario">
                                @include('admin.modulo-admin.usuarios.edit.formusuario')
                            </div>                                    
                            <div class="tab-pane" id="rol">
                                @include('admin.modulo-admin.usuarios.edit.formrol')
                            </div>
                            <div class="tab-pane" id="permiso">
                                @include('admin.modulo-admin.usuarios.edit.formpermiso')
                            </div>
                          </div>                          
                        </div>
                    </div>
                </div>
                @include('admin.partials.regresar2')
            </div>
        </div>
    </section>
</div>
@stop