@extends('layouts.template-admin')
@section('titulo', 'Editar permiso')
@section('header')
  <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="fas fa-home"></i></a></li>
  <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permisos</a></li>
  <li class="breadcrumb-item active" aria-current="page">Editar permiso</li>
@stop()
@section('content')
<div class="container-fluid mt--6">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Editar Permiso</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Información del Permiso</h6>
                        <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                            @csrf @method('PUT')                            
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Identificador</label>
                                            <input class="form-control" placeholder="Nombre" value="{{ $permission->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="display_name">Nombre</label>
                                            <input name="display_name" class="form-control" placeholder="Nombre" value="{{ old('display_name', $permission->display_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="guard_name">Guard</label>
                                            <select class="form-control" name="guard_name">
                                                @foreach (config('auth.guards') as $guardName => $guard)
                                                    <option {{ old('guard_name', $permission->guard_name) === $guardName ? 'selected' : ''}} value="{{ $guardName }}">{{ $guardName }}</option>
                                                @endforeach                                            
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-4">                                    
                                    <div class="col-lg-6 mr-auto ml-auto">
                                        <div class="form-group">                    
                                            <button class="btn btn-default btn-block">Editar permisos</button>
                                        </div>
                                    </div>        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials.footer')
    </div>
@endsection