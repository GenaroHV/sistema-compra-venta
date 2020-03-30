@extends('layouts.app')
@section('titulo', 'Bienvenido')
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.header-page')
        <section class="content">
        <div class="container-fluid">
            @include('admin.partials.card')
            @include('admin.partials.graficos')
        </div>
        </section>
    </div>
@stop
