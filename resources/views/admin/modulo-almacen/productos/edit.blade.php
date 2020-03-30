@extends('layouts.app')
@section('titulo', 'Actualizando Producto')
@section('content')
<div class="content-wrapper">

  <section class="content pt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Actualizando Producto</h3>
            </div>
            
            <form role="form" action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
              @csrf @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="codigo">Código</label>
                  <input type="text" class="form-control" name="codigo" value="{{ old('nombre', $producto->codigo) }}">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $producto->nombre)}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" rows="6" class="form-control">{{ old('nombre', $producto->descripcion)}}</textarea>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" name="precio" value="{{ old('nombre', $producto->precio)}}">
                </div>
                 
                <div class="form-group">
                    <label class="form-control-label">Categoria</label>
                    <select name="categorias[]" class="form-control">
                            <option value="" disabled selected hidden>Selecciona una categoria</option>
                        @foreach ($categorias as $categoria)
                            <option {{ collect(old('categorias', $producto->categorias->pluck('id')))->contains($categoria->id) ? 'selected' :'' }} value="{{ $categoria->id }}" placeholder="Seleccion">
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
                <button type="submit" class="btn btn-primary">Actualizar</button>
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