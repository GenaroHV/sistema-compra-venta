@extends('layouts.app')
@section('titulo', 'Crear Producto')
@section('content')
<div class="content-wrapper">

  <section class="content pt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Crear Producto</h3>
            </div>
            
            <form role="form" action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
              @csrf @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="codigo">Código</label>
                  <input type="text" class="form-control" name="codigo" placeholder="Ingresar código">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" rows="6" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" name="precio" placeholder="00.00">
                </div>
                 
                <div class="form-group">
                    <label class="form-control-label">Categoria</label>
                    <select name="categorias[]" class="form-control">
                            <option value="" disabled selected hidden>Selecciona una categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" placeholder="Seleccion">
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-control-label">Imagen del Producto</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="avatar" lang="es">
                        <label class="custom-file-label" for="avatar">Selecciona archivo</label>
                    </div>    
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