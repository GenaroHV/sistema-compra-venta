@extends('layouts.app')
@section('titulo', 'Lista de Usuarios')
@section('content')
<div class="content-wrapper">

    <section class="content pt-3">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12 col-md-9 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header py-1">
                          <h3 class="card-title pt-2 mb-0 pb-0">
                            <b>LISTA DE USUARIOS</b>
                          </h3>                          
                          <div class="float-right">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-dark rounded-circle boton-custom" data-toggle="tooltip" data-placement="top" title="Crear usuario">
                              <i class="fas fa-plus"></i>
                            </a>
                          </div>
                        </div>
                        <div class="card-body table-responsive">
                          <table id="tabla-categoria" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Email</th>
                              <th>Roles</th>
                              <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($users as $user)
                              <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                                <td align="center">
                                  <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info rounded-circle boton-custom" data-toggle="tooltip" data-placement="top" title="Ver usuario">
                                    <i class="fas fa-eye fa-sm"></i>
                                  </a>
                                  <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success rounded-circle boton-custom" data-toggle="tooltip" data-placement="top" title="Editar usuario">
                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                  </a>
                                  <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger rounded-circle boton-custom" id="deleteButton" data-toggle="tooltip" data-placement="top" title="Eliminar usuario">
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
                              <th>Email</th>
                              <th>Roles</th>
                              <th>Acciones</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                </div>
                <div style ="position: absolute; bottom: 8px;right:8px;">
                  <a href="{{ url('/admin/configurar') }}" class="btn btn-dark rounded-circle boton-custom" data-toggle="tooltip" data-placement="top" title="Regresar">
                      <i class="fas fa-sign-in-alt fa-flip-horizontal"></i>
                  </a>
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
