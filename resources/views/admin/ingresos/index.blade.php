@extends('layouts.app')
@section('titulo', 'Lista de Ingresos')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6 ml-auto mr-auto">
                    <h1 class="m-0 text-dark text-center">Lista de Ingresos</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <table id="tabla-categoria" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Proveedor</th>
                                <th>Tipo</th>
                                <th>Serie</th>
                                <th>Número</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Impuesto</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($ingresos as $ingreso)
                              <tr>
                                <td>{{ $ingreso->id }}</td>
                                <td>{{ $ingreso->name }}</td>
                                <td>{{ $ingreso->nombre }}</td>                                
                                <td>{{ $ingreso->tipo_comprobante }}</td>
                                <td>{{ $ingreso->serie_comprobante }}</td>
                                <td>{{ $ingreso->numero_comprobante }}</td>
                                <td>{{ $ingreso->fecha_hora }}</td>
                                <td>{{ $ingreso->total }}</td>
                                <td>{{ $ingreso->impuesto }}</td>
                                <td>{{ $ingreso->estado }}</td>
                                <td align="center">
                                    <a href="{{ route('admin.ingresos.desactivar', $ingreso->id) }}" class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Desactivar">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Proveedor</th>
                                <th>Tipo</th>
                                <th>Serie</th>
                                <th>Número</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Impuesto</th>
                                <th>Estado</th>
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
 
        
      });
    </script>
@endpush
