@extends('layouts.app')
@section('titulo', 'Crear Categoría')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-6 ml-auto mr-auto">
                  <h1 class="m-0 text-dark text-center">Crear Categoría</h1>
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

            <form role="form" action="{{ route('admin.categorias.store') }}" method="POST">
              @csrf @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre de categoría</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre">
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