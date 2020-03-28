@extends('layouts.app')
@section('titulo', 'Lista de Ventas')
@section('content')
<div class="content-wrapper">

    <section class="content pt-3">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-1">
                          <h3 class="card-title">
                            <b>LISTA DE VENTAS</b>                            
                          </h3>
                        </div>
                        <div class="card-body table-responsive">
                          <table id="tabla-categoria" class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                              <th class="mx-auto" style="width: 110px;">Fecha</th>
                              <th class="mx-auto" style="width: 100px;">Número</th>                                
                              <th class="mx-auto" style="width: 150px;">Cliente</th>
                              <th>Tipo</th>
                              <th>Serie</th>
                              <th class="mx-auto" style="width: 130px;">Vendedor</th>                             
                              <th>Total</th>
                              <th>Estado</th>
                              <th class="mx-auto" style="width: 170px;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($ventas as $venta)
                              <tr>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($venta->fecha_hora)->format('d/m/Y') }}</td>
                                <td class="align-middle">{{ $venta->numero_comprobante }}</td>                              
                                <td class="align-middle">{{ $venta->cliente }}</td>                                
                                <td class="align-middle">{{ $venta->tipo_comprobante }}</td>
                                <td class="align-middle">{{ $venta->serie_comprobante }}</td>                                
                                <td class="align-middle">{{ $venta->name }}</td>
                                <td class="align-middle">{{ $venta->total }}</td>
                                <td class="align-middle">
                                  @if ( $venta->estado !== "Anulado")
                                  <span class="badge badge-success">{{ $venta->estado }}</span>                                 
                                  @else
                                  <span class="badge badge-danger">{{ $venta->estado }}</span>                                 
                                  @endif
                                </td>
                                <td class="align-middle" align="left">
                                    <a href="{{ route('admin.ventas.show', $venta->id) }}" class="btn btn-info rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Ver detalles de venta">
                                      <i class="fas fa-eye fa-sm"></i>
                                    </a>
                                    {{--  
                                    <a href="{{ route('admin.ventas.print', $venta->id) }}" target="_blank" class="btn btn-warning rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Imprimir venta">
                                      <i class="fas fa-print text-white fa-sm"></i>
                                    </a>
                                    
                                    <a href="{{ route('admin.ventas.pdf', $venta->id)}}" target="_blank" class="btn btn-primary rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Exportar venta en PDF">
                                      <i class="fas fa-download fa-sm"></i>
                                    </a>
                                    --}}
                                    @if( $venta->estado !== "Anulado")
                                    <form action="{{ route('admin.ventas.destroy', $venta->id) }}" method="POST" style="display: inline">
                                        @csrf {{ method_field('DELETE') }}
                                        <button class="btn btn-danger rounded-circle" id="deleteButton" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Anular venta">
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
                              <th class="mx-auto" style="width: 150px;">Cliente</th>
                              <th>Tipo</th>
                              <th>Serie</th>
                              <th class="mx-auto" style="width: 130px;">Vendedor</th>                             
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
              text: "Recuerda que puedes revertirlo",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#11cdef',
              cancelButtonColor: '#f5365c',
              confirmButtonText: 'Si, cambiar',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.value) {
                Swal.fire(
                  'Estado',
                  'Su archivo ha sido cambiado de estado.',
                  'success'
                )
                $(this).closest("form").submit();
              }
            })
          });
        
      });
    </script>
@endpush
