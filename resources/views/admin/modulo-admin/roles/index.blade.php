@extends('layouts.app')
@section('titulo', 'Listado de Roles')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-6 ml-auto mr-auto">
                  <h1 class="m-0 text-dark text-center">Lista de Roles</h1>
              </div>
          </div>
      </div>
  </div>

  <section class="content">
      <div class="container-fluid">         
          <div class="row">
              <div class="col-12 col-md-10 ml-auto mr-auto">
                  <div class="card">
                      <div class="card-body table-responsive">
                      <table id="table-posts" class="table table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Permisos</th>
                            <th>Guard</th>
                            <th>Acciones</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($roles as $role)
                          <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name}}</td>
                            <td>{{ $role->permissions->pluck('name')->implode(', ')}}</td>            
                            <td>{{ $role->guard_name }}</td>
                            <td>   
                                  
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-info rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                </a>
                              
                            
                                @if($role->id !== 1)
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display: inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger rounded-circle" id="deleteButton" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                                        <i class="fas fa-trash-alt fa-sm"></i>
                                    </button>
                                </form>
                                @endif
                              
                            </td>
                          </tr>
                          @endforeach
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush
@push('js')
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.all.min.js"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
@endpush