@extends('layouts.app')
@section('titulo', 'Disminuir Stock')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-6 ml-auto mr-auto">
                  <h1 class="m-0 text-dark text-center">Disminuir Stock</h1>
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
              <h3 class="card-title">Ingresar cantidad</h3>
            </div>
            
            <form role="form" action="{{ route('admin.productos.disminuir', $producto->id) }}" method="POST">
              @csrf @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="cantidad">Cantidad</label>
                  <input type="text" class="form-control" name="cantidad" placeholder="Ingresar nombre">
                </div>                
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Grabar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@stop