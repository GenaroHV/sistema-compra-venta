@extends('layouts.app')
@section('titulo', 'Lista de Proveedores')
@section('content')
<div class="content-wrapper">

    <section class="content pt-3">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-1">
                          <h3 class="card-title">
                          <b>LISTA DE PROVEEDORES</b>                            
                          </h3>
                        </div>
                        <div class="card-body table-responsive">
                          <table id="tabla-categoria" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Tipo de documento</th>
                              <th>Número de documento</th>
                              <th>Dirección</th>
                              <th>Teléfono</th>
                              <th>Email</th>
                              <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($proveedores as $proveedor)
                              <tr>
                                <td>{{ $proveedor->id }}</td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->tipo_documento }}</td>
                                <td>{{ $proveedor->numero_documento }}</td>
                                <td>{{ $proveedor->direccion }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->email }}</td>
                                <td align="center">
                                  <a href="{{ route('admin.proveedores.edit', $proveedor->id) }}" class="btn btn-info rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                  </a>
                                  <form action="{{ route('admin.proveedores.destroy', $proveedor) }}" method="POST" style="display: inline">
                                    @csrf {{ method_field('DELETE') }}
                                    <button class="btn btn-danger rounded-circle" id="deleteButton" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                                      <i class="fas fa-trash-alt fa-sm"></i>
                                    </button>
                                  </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Tipo de documento</th>
                              <th>Número de documento</th>
                              <th>Dirección</th>
                              <th>Teléfono</th>
                              <th>Email</th>
                              <th>Acciones</th>
                            </tr>
                            </tfoot>
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
    <script>
      $(document).ready(function() {
          $('#tabla-categoria').DataTable({
              "language": {
                  "sProcessing": "Procesando...",
                  "sLengthMenu": "Mostrar _MENU_ registros",
                  "sZeroRecords": "No se encontraron resultados",
                  "sEmptyTable": "Ningún dato disponible en esta tabla",
                  "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix": "",
                  "sSearch": "Buscar:",
                  "sUrl": "",
                  "sInfoThousands": ",",
                  "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast": "Último",
                      "sNext": "<i class='fas fa-angle-right'></i>",
                      "sPrevious": "<i class='fas fa-angle-left'></i>"
                  },
                  "oAria": {
                      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  }
              },
              "order": [[ 0, "desc" ]]
          });      
 
          $('button#deleteButton').on('click', function(e){
            e.preventDefault();
            // iniciar
            Swal.fire({
              title: '¿Estás seguro?',
              text: "¡No podrás revertir esto!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#11cdef',
              cancelButtonColor: '#f5365c',
              confirmButtonText: 'Si, eliminar',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.value) {
                Swal.fire(
                  'Eliminado',
                  'Su archivo ha sido eliminado.',
                  'success'
                )
                $(this).closest("form").submit();
              }
            }) 
          });
      });
    </script>
@endpush
