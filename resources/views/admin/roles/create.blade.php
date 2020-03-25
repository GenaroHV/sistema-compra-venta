@extends('layouts.app')
@section('titulo', 'Crear Rol')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6 ml-auto mr-auto">
                    <h1 class="m-0 text-dark text-center">Crear Rol</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12 col-md-9 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-body">                            
                            <h6 class="heading-small text-muted mb-4">Información del Role</h6>
                            <form method="POST" action="{{ route('admin.roles.store') }}">
                                @csrf @method('POST')                            
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="name">Nombre</label>
                                                <input name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="guard_name">Guard</label>
                                                <select class="form-control" name="guard_name">
                                                    @foreach (config('auth.guards') as $guardName => $guard)
                                                        <option {{ old('guard_name') === $guardName ? 'selected' : ''}} value="{{ $guardName }}">{{ $guardName }}</option>
                                                    @endforeach                                            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-control-label">Permisos</label>
                                            @include('admin.permisos.checkboxes', ['model' => $role])
                                        </div>
                                    </div>
                                    <div class="row my-4">                                    
                                        <div class="col-lg-6 mr-auto ml-auto">
                                            <div class="form-group">                    
                                                <button class="btn btn-primary btn-block">Crear role</button>
                                            </div>
                                        </div>        
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
@endsection