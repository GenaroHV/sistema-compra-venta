@extends('layouts.app')
@section('titulo', 'Zona de Configuración')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Zona de Configuración</h1>
                    <p>Hola <b>{{ Auth()->user()->name }}</b>, solo para hacerte recordar que hay información muy delicada en esta sección del sistema.</p>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ count($user) }}</h3>
                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">Leer más <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ count($role) }}</h3>
                        <p>Roles</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <a href="{{ route('admin.roles.index') }}" class="small-box-footer">Leer más <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner text-white">
                        <h3>{{ count($permission) }}</h3>
                        <p>Permisos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <a href="{{ route('admin.permissions.index') }}" class="small-box-footer" style="color: white !important;">Leer más <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--
            <div class="col-lg-3 col-6">
                <div class="small-box bg-dark">
                    <div class="inner text-white">
                        <h3>1</h3>
                        <p>Configurar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="color: white !important;">Leer más <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            --}}
        </div>
      </div>
    </section>
</div>
@stop