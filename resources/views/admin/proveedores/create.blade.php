@extends('layouts.app')
@section('titulo', 'Crear Proveedor')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-6 ml-auto mr-auto">
                  <h1 class="m-0 text-dark text-center">Crear Proveedor</h1>
              </div>
          </div>
      </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ingresar los datos</h3>
            </div>

            <form role="form" action="{{ route('admin.proveedores.store') }}" method="POST">
              @csrf @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre">
                </div>
                <div class="form-group">
                    <label for="tipo_documento">Tipo de documento</label>
                    <select name="tipo_documento" class="form-control">
                        <option value="" disabled selected hidden>Seleccione una opción</option>                        
                        @foreach($tipo_documento as $item)
                          <option value="{{ $item }}"> {{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="numero_documento">Número de documento</label>
                    <input type="text" class="form-control" name="numero_documento" placeholder="Ingresar número de documento">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Ingresar dirección">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Ingresar teléfono">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresar email">
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Crear</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@stop