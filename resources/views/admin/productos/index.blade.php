@extends('layouts.app')
@section('titulo', 'Lista de Productos')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6 ml-auto mr-auto">
                    <h1 class="m-0 text-dark text-center">Lista de Productos</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
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
                            <tbody>
                              @foreach ($productos as $producto)
                              <tr>
                                <td>{{ $producto->id }}</td>
                                @if($producto->avatar)
                                <td>
                                    <a href="" data-toggle="modal" data-target="#modal{{$producto->id}}">
                                        <img src="{{ asset('storage/' .$producto->avatar) }}" alt="" class="img-fluid" width="60px" height="60px">
                                    </a>
                                </td>
                                @else
                                <td>
                                  <a href="" data-toggle="modal" data-target="#modal{{$producto->id}}">
                                      <img src="{{ asset('img/productos/default-product.png') }}" alt="" class="img-fluid border" width="60px" height="60px">
                                  </a>
                                </td>
                                @endif
                                <td class="text-uppercase">{{ $producto->codigo }}</td>
                                <td class="text-uppercase">{{ $producto->nombre }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td class="text-uppercase">{{ $producto->descripcion }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td class="text-uppercase">
                                  @foreach ( $producto->categorias as $categoria)
                                      {{ $categoria->nombre }}
                                  @endforeach
                                </td>
                                <td align="center">
                                  {{--  
                                  <a href="{{ route('admin.productos.incrementar', $producto->id) }}" class="btn btn-warning" role="button" data-toggle="tooltip" data-placement="top" title="Aumentar Cantidad">
                                    <i class="fas fa-sort-numeric-up"></i>
                                  </a>
                                  <a href="{{ route('admin.productos.disminuir', $producto->id) }}" class="btn btn-warning" role="button" data-toggle="tooltip" data-placement="top" title="Disminuir Cantidad">
                                    <i class="fas fa-sort-numeric-down"></i>
                                  </a>
                                  --}}
                                  <a href="{{ route('admin.productos.show', $producto->id) }}" class="btn btn-info rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                                    <i class="fas fa-eye fa-sm"></i>
                                  </a>
                                  <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-success rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                  </a>
                                  <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" style="display: inline">
                                    @csrf {{ method_field('DELETE') }}
                                    <button class="btn btn-danger rounded-circle" id="deleteButton" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                                      <i class="fas fa-trash-alt fa-sm"></i>
                                    </button>
                                  </form>
                                </td>
                              </tr>
                              <!-- Modal -->
                              @if($producto->avatar)
                              <div class="modal fade" id="modal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-body">
                                              <img src="{{ asset('storage/' .$producto->avatar) }}" class="img-fluid">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              @else
                              <div class="modal fade" id="modal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            </tbody>
                            <tfoot>
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
          $('#tabla-productos').DataTable({
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
