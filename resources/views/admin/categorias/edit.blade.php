@extends('layouts.app')
@section('titulo', 'Actualizar Categoría')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-6 ml-auto mr-auto">
                  <h1 class="m-0 text-dark text-center">Actualizar Categoría</h1>
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

            <form role="form" action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST">
              @csrf @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre de categoría</label>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $categoria->nombre )}}">
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