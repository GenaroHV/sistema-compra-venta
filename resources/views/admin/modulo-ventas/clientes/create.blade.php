@extends('layouts.app')
@section('titulo', 'Crear Cliente')
@section('content')
<div class="content-wrapper">

  <section class="content pt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Crear Cliente</h3>
            </div>

            <form role="form" action="{{ route('admin.clientes.store') }}" method="POST">
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
                        @foreach(config('enum.tipo_documento') as $item)
                          <option value="{{ $item }}"> {{ $item }}</option>
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
        @include('admin.partials.regresar2')
      </div>
    </div>
  </section>

</div>
@stop