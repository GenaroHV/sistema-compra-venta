@extends('layouts.app')
@section('titulo', 'Actualizar Proveedor')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-6 ml-auto mr-auto">
                  <h1 class="m-0 text-dark text-center">Actualizar Proveedor</h1>
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

            <form role="form" action="{{ route('admin.proveedores.update', $proveedor->id) }}" method="POST">
              @csrf @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $proveedor->nombre)}}">
                </div>
                <div class="form-group">
                    <label for="tipo_documento">Tipo de documento</label>
                    <select name="tipo_documento" class="form-control">                        
                        @foreach($tipo_documento as $item)
                        <option value="{{ $item }}" @if($proveedor->tipo_documento === $item) selected='selected' @endif> {{ strtoupper($item) }}</option>
                        @endforeach
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="numero_documento">Número de documento</label>
                    <input type="text" class="form-control" name="numero_documento" value="{{ old('numero_documento', $proveedor->numero_documento)}}">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion', $proveedor->direccion)}}">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" value="{{ old('telefono', $proveedor->telefono)}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $proveedor->email)}}">
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@stop