@extends('layouts.app')
@section('titulo', 'Lista de Compras')
@section('content')
<div class="content-wrapper">

    <section class="content pt-4">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header py-1">
                          <h3 class="card-title pt-2 mb-0 pb-0">
                            <b>LISTA DE COMPRAS</b>                            
                          </h3>
                          <div class="float-right">
                            <a href="{{ route('admin.compras.create') }}" class="btn btn-primary rounded-circle" data-toggle="tooltip" data-placement="top" title="Realizar compra">
                              <i class="fas fa-plus"></i>
                            </a>
                          </div>
                        </div>
                        <div class="card-body table-responsive">
                          <table id="tabla-categoria" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                              <th class="mx-auto" style="width: 110px;">Fecha</th>
                              <th class="mx-auto" style="width: 100px;">Número</th>                                
                              <th class="mx-auto" style="width: 150px;">Proveedor</th>
                              <th>Tipo</th>
                              <th>Serie</th>
                              <th class="mx-auto" style="width: 130px;">Comprador</th>                             
                              <th>Total</th>
                              <th>Estado</th>
                              <th class="mx-auto" style="width: 170px;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($compras as $compra)
                              <tr>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($compra->fecha_hora)->format('d/m/Y') }}</td>
                                <td class="align-middle">{{ $compra->numero_comprobante }}</td>                              
                                <td class="align-middle">{{ $compra->proveedor }}</td>                                
                                <td class="align-middle">{{ $compra->tipo_comprobante }}</td>
                                <td class="align-middle">{{ $compra->serie_comprobante }}</td>                                
                                <td class="align-middle">{{ $compra->name }}</td>
                                <td class="align-middle">{{ $compra->total }}</td>
                                <td class="align-middle">
                                  @if ( $compra->estado !== "Anulado")
                                  <span class="badge badge-success">{{ $compra->estado }}</span>                                 
                                  @else
                                  <span class="badge badge-danger">{{ $compra->estado }}</span>                                 
                                  @endif
                                </td>
                                <td class="align-middle" align="left">
                                    <a href="{{ route('admin.compras.show', $compra->id) }}" class="btn btn-info rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Ver detalles de compra">
                                      <i class="fas fa-eye fa-sm"></i>
                                    </a>
                                    <a href="{{ route('admin.compras.print', $compra->id) }}" target="_blank" class="btn btn-warning rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Imprimir compra">
                                      <i class="fas fa-print text-white fa-sm"></i>
                                    </a>
                                    <a href="{{ route('admin.compras.pdf', $compra->id)}}" target="_blank" class="btn btn-secondary rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Exportar compra en PDF">
                                      <i class="fas fa-download fa-sm"></i>
                                    </a>
                                    @if( $compra->estado !== "Anulado")
                                    <form action="{{ route('admin.compras.destroy', $compra->id) }}" method="POST" style="display: inline">
                                        @csrf {{ method_field('DELETE') }}
                                        <button class="btn btn-danger rounded-circle" id="deleteButton" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Anular compra">
                                            <i class="fas fa-ban fa-sm"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                              <th class="mx-auto" style="width: 110px;">Fecha</th>
                              <th class="mx-auto" style="width: 100px;">Número</th>                                
                              <th class="mx-auto" style="width: 150px;">Proveedor</th>
                              <th>Tipo</th>
                              <th>Serie</th>
                              <th class="mx-auto" style="width: 130px;">Comprador</th>                             
                              <th>Total</th>
                              <th>Estado</th>
                              <th class="mx-auto" style="width: 170px;">Acciones</th>
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
              confirmButtonText: 'Si, continuar',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.value) {
                Swal.fire(
                  'Anulado',
                  'Su compra ha sido anulada.',
                  'success'
                )
                $(this).closest("form").submit();
              }
            })
          });
        
      });
    </script>
@endpush
