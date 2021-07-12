@extends('layouts.app')
@section('titulo', 'Lista de Productos')
@section('content')
<div class="content-wrapper">

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                      <div class="card-header py-1">
                        <div class="row">
                          <div class="col-md-6">
                            <h3 class="card-title pt-3 mb-0 pb-0">
                              <b>LISTA DE PRODUCTOS</b>
                            </h3>
                          </div>
                          <div class="col-md-6">
                            <div class="float-right my-2">
                              <div class="btn-group">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#crearProductoModal">
                                  <i class="fas fa-plus"></i> Agregar
                                </a>
                                <a href="{{ route('admin.productos.pdf') }}" class="btn btn-secondary">
                                  <i class="fas fa-file-pdf"></i> PDF
                                </a>
                                <a href="{{ route('admin.productos.excel') }}" class="btn btn-success">
                                  <i class="fas fa-file-excel"></i> EXCEL
                                </a>
                              </div>
                            </div>
                          </div>   
                        </div>
                      </div>
                        <div class="card-body table-responsive">
                          <table id="tabla-productos" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Imagen</th>
                              <th>Código</th>
                              <th>Nombre</th>
                              <th>Cantidad</th>
                              <th>Descripción</th>
                              <th>Precio c/u</th>
                              <th>Categoría</th>
                              <th>Acciones</th>
                            </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
</div>
@foreach ($productos as $producto)
  <!-- Modal -->
  @if($producto->avatar)
  <div class="modal fade" id="modalImagenProducto{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-body">
                  <img src="{{ asset('storage/' .$producto->avatar) }}" class="img-fluid">
              </div>
          </div>
      </div>
  </div>
  @else
  <div class="modal fade" id="modalImagenProducto{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="{{ asset('img/productos/default-product.png') }}" class="img-fluid">
            </div>
        </div>
    </div>
  </div>
  @endif
@endforeach
@stop

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.all.min.js"></script>
  
@include('admin.modulo-almacen.productos.create')
@include('admin.modulo-almacen.productos.show')
@include('admin.modulo-almacen.productos.edit')
{{-- CREAR PRODUCTO --}}
@unless(request()->is('admin/categorias/*'))
    <script>
      var errorForm = "{{ $errors->any() ? 'is-invalid' : ''}}";
      if(errorForm){
        $('#crearProductoModal').modal('show');
      }

      if( window.location.hash === '#crear'){
        $('#crearProductoModal').modal('show');        
      }
      $('#crearProductoModal').on('hide.bs.modal', function(){
        window.location.hash = '#';
      });
      $('#crearProductoModal').on('shown.bs.modal', function(){
        $('#producto-serie').focus();
        window.location.hash = '#crear';
      }); 
    </script>
@endunless
{{-- ACTUALIZAR PRODUCTO --}}
@foreach ($productos as $producto)
    <script>
      if( window.location.hash === "#editar{{ $producto->id }}"){
        $('#actualizarProductoModal{{ $producto->id }}').modal('show');        
      }
      $('#actualizarProductoModal{{ $producto->id }}').on('hide.bs.modal', function(){
        window.location.hash = '#';
      });
      $('#actualizarProductoModal{{ $producto->id }}').on('shown.bs.modal', function(){
        $('#producto-nombre').focus();
        window.location.hash = "#editar{{ $producto->id }}";
      });
    </script>
@endforeach
{{-- VER PRODUCTO --}}
@foreach ($productos as $verProducto)
    <script>
      if( window.location.hash === "#ver{{ $verProducto->id }}"){
        $('#verProductoModal{{ $verProducto->id }}').modal('show');        
      }
      $('#verProductoModal{{ $verProducto->id }}').on('hide.bs.modal', function(){
        window.location.hash = '#';
      });
      $('#verProductoModal{{ $verProducto->id }}').on('shown.bs.modal', function(){
        window.location.hash = "#ver{{ $verProducto->id }}";
      });
    </script>
@endforeach

<script>
  @include('admin.modulo-almacen.productos.script')  
</script>

@endpush
