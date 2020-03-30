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
                          <h3 class="card-title pt-2 mb-0 pb-0">
                            <b>LISTA DE PRODUCTOS</b>
                          </h3>                          
                          <div class="float-right">
                            <a href="{{ route('admin.productos.create') }}" class="btn btn-primary rounded-circle" data-toggle="tooltip" data-placement="top" title="Crear producto">
                              <i class="fas fa-plus"></i>
                            </a>
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
                            <tbody>
                              @foreach ($productos as $producto)
                              <tr>
                                <td class="align-middle">{{ $producto->id }}</td>
                                @if($producto->avatar)
                                <td class="align-middle">
                                    <a href="" data-toggle="modal" data-target="#modal{{$producto->id}}">
                                        <img src="{{ asset('storage/' .$producto->avatar) }}" alt="" class="img-fluid" width="60px" height="60px">
                                    </a>
                                </td>
                                @else
                                <td class="align-middle">
                                  <a href="" data-toggle="modal" data-target="#modal{{$producto->id}}">
                                      <img src="{{ asset('img/productos/default-product.png') }}" alt="" class="img-fluid border" width="60px" height="60px">
                                  </a>
                                </td>
                                @endif
                                <td class="align-middle">{{ $producto->codigo }}</td>
                                <td class="align-middle">{{ $producto->nombre }}</td>
                                <td class="align-middle">{{ $producto->stock }}</td>
                                <td class="align-middle">{{ $producto->descripcion }}</td>
                                <td class="align-middle">{{ $producto->precio }}</td>
                                <td class="align-middle">
                                  @foreach ( $producto->categorias as $categoria)
                                      {{ $categoria->nombre }}
                                  @endforeach
                                </td>
                                <td class="align-middle" align="left">
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
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endpush
