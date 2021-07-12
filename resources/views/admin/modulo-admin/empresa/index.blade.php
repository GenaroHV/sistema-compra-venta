@extends('layouts.app')
@section('titulo', 'Empresa')
@section('content')
<div class="content-wrapper">

  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Información de Empresa</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                  title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-12 col-lg-8">
                  @include('admin.modulo-admin.empresa._form')
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                  <h4 class="text-secondary">
                    @if($empresa->first()->logo)
                    <img height="50" width="50" src="/storage/{{ $empresa->first()->logo }}" class="img-fluid img-circle border"
                    alt="logo">
                    @else
                    <img height="50" width="50" src="https://via.placeholder.com/150" class="img-fluid img-circle"
                    alt="logo">
                    @endif
                    {{ $empresa->first()->razon_social }}
                  </h4>
                  <div class="card text-white bg-secondary">
                    <div class="card-body">
                      <h5>Datos de la empresa</h5>
                      <div>
                        <p class="text-sm mb-1">Propietario:
                          <b class="d-block">{{ $empresa->first()->propietario }}</b>
                        </p>
                        <p class="text-sm mb-1">RUC:
                          <b class="d-block">{{ $empresa->first()->ruc }}</b>
                        </p>
                        <p class="text-sm mb-1">Teléfono:
                          <b class="d-block">{{ $empresa->first()->telefono }}</b>
                        </p>
                        <p class="text-sm mb-1">Correo:
                          <b class="d-block">{{ $empresa->first()->email }}</b>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="card text-white bg-secondary">
                    <div class="card-body">
                      <h5>Datos de venta</h5>
                      <div>
                        <p class="text-sm mb-1">Impuesto:
                          <b>{{ $empresa->first()->igv }} %</b>
                        </p>
                        <p class="text-sm mb-1">Moneda:
                          <b>{{ $empresa->first()->moneda }}</b>
                        </p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
@stop