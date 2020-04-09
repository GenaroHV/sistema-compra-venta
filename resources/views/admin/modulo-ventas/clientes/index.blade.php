@extends('layouts.app')
@section('titulo', 'Lista de Clientes')
@section('content')
<div class="content-wrapper">

    <section class="content pt-4">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header py-1">
                        <h3 class="card-title pt-2 mb-0 pb-0">
                          <b>LISTA DE CLIENTES</b>                          
                        </h3>                          
                        <div class="float-right">
                          <a href="{{ route('admin.clientes.create') }}" class="btn btn-primary rounded-circle" data-toggle="tooltip" data-placement="top" title="Crear cliente">
                            <i class="fas fa-plus"></i>
                          </a>
                        </div>
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
                              @foreach ($clientes as $cliente)
                              <tr>
                                <td class="align-middle">{{ $cliente->id }}</td>
                                <td class="align-middle">{{ $cliente->nombre }}</td>
                                <td class="align-middle">{{ $cliente->tipo_documento }}</td>
                                <td class="align-middle">{{ $cliente->numero_documento }}</td>
                                <td class="align-middle">{{ $cliente->direccion }}</td>
                                <td class="align-middle">{{ $cliente->telefono }}</td>
                                <td class="align-middle">{{ $cliente->email }}</td>
                                <td class="align-middle" align="left">
                                  <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-success rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Editar cliente">
                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                  </a>
                                  <form action="{{ route('admin.clientes.destroy', $cliente) }}" method="POST" style="display: inline">
                                    @csrf {{ method_field('DELETE') }}
                                    <button class="btn btn-danger rounded-circle" id="deleteButton" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Eliminar cliente">
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
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endpush
