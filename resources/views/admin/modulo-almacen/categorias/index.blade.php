@extends('layouts.app')
@section('titulo', 'Lista de Categorías')
@section('content')
<div class="content-wrapper">

  <section class="content pt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-9 ml-auto mr-auto">
          <div class="card">
            <div class="card-header py-1">
              <div class="row">
                <div class="col-md-6">
                  <h3 class="card-title pt-3 mb-0 pb-0">
                    <b>LISTA DE CATEGORIAS</b>
                  </h3>
                </div>
                <div class="col-md-6">
                  <div class="float-right my-2">
                    <div class="btn-group">
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#crearCategoriaModal">
                        <i class="fas fa-plus"></i> Agregar
                      </a>
                      <a href="{{ route('admin.categorias.pdf') }}" class="btn btn-secondary">
                        <i class="fas fa-file-pdf"></i> PDF
                      </a>
                      <a href="{{ route('admin.categorias.excel') }}" class="btn btn-success">
                        <i class="fas fa-file-excel"></i> EXCEL
                      </a>
                    </div>
                  </div>
                </div>   
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="tabla-categoria" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
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
@stop

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush
@push('js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.all.min.js"></script>

@include('admin.modulo-almacen.categorias.create')
@include('admin.modulo-almacen.categorias.edit')
@unless(request()->is('admin/categorias/*'))
    <script>
      var errorForm = "{{ $errors->any() ? 'is-invalid' : ''}}";
      if(errorForm){
        $('#crearCategoriaModal').modal('show');
      }

      if( window.location.hash === '#crear'){
        $('#crearCategoriaModal').modal('show');        
      }
      $('#crearCategoriaModal').on('hide.bs.modal', function(){
        window.location.hash = '#';
      });
      $('#crearCategoriaModal').on('shown.bs.modal', function(){
        $('#categoria-nombre').focus();
        window.location.hash = '#crear';
      }); 
    </script>
@endunless
@foreach ($categorias as $categoria)
    <script>
      if( window.location.hash === "#editar{{ $categoria->id }}"){
        $('#actualizarCategoriaModal{{ $categoria->id }}').modal('show');        
      }
      $('#actualizarCategoriaModal{{ $categoria->id }}').on('hide.bs.modal', function(){
        window.location.hash = '#';
      });
      $('#actualizarCategoriaModal{{ $categoria->id }}').on('shown.bs.modal', function(){
        $('#categoria-nombre').focus();
        window.location.hash = "#editar{{ $categoria->id }}";
      });
    </script>
@endforeach
<script>
  @include('admin.modulo-almacen.categorias.script')  
</script>
@endpush