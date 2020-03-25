@extends('layouts.app')
@section('titulo', 'Crear Usuario')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6 ml-auto mr-auto">
                    <h1 class="m-0 text-dark text-center">Crear Usuario</h1>
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
                            INFORMACIÓN DE USUARIO
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('nombre') }}">
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('nombre') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-3 col-form-label">Nombre de Usuario</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username" placeholder="Nombre de usuario" value="{{ old('username') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-control-label">Roles</label>
                                    @include('admin.roles.checkboxes')
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-control-label">Permisos</label>
                                    @include('admin.permisos.checkboxes', ['model' => $user])
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-6 col-sm-6">
                                        <button class="btn btn-primary btn-block">Crear</button>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-default text-small">La contraseña generada por defecto es: 654321</span>
                                    </div>
                                </div>
                            </form>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop