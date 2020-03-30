@extends('layouts.app')
@section('titulo', 'Crear Categoría')
@section('content')
<div class="content-wrapper">

  <section class="content pt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Crear Categoría</h3>
            </div>

            <form role="form" action="{{ route('admin.categorias.store') }}" method="POST">
              @csrf @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea name="descripcion" rows="6" class="form-control"></textarea>
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