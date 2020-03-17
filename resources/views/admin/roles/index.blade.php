@extends('layouts.template-admin')
@section('titulo', 'Listado de Roles')
@section('header')
  <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="fas fa-home"></i></a></li>
  <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
  <li class="breadcrumb-item active" aria-current="page">Listado de roles</li>
@stop()
@section('content')
  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h2 class="mb-0">Lista de Roles</h2>
                  <p class="text-sm mb-0">
                    En esta sección puedes ver, editar, eliminar y buscar los roles que creas conveniente.
                  </p>
                </div>
                @if(Auth::user()->hasPermissionTo('Crear role') || Auth::user()->hasRole('Administrador'))
                <div class="col-4 text-right">
                  <a href="{{ route('admin.roles.create')}}" class="btn btn-default text-white rounded-circle">+</a>
                </div>
                @endif
              </div>              
            </div>
            <div class=" table-responsive py-4">
              <table id="table-posts" class="table table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Identificador</th>
                    <th>Permisos</th>
                    <th>Guard</th>
                    @if(Auth::user()->hasAnyPermission(['Editar role', 'Eliminar role']) || Auth::user()->hasRole('Administrador'))
                      <th>Acciones</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name}}</td>     
                    <td>{{ $role->display_name}}</td>
                    <td>{{ $role->permissions->pluck('name')->implode(', ')}}</td>            
                    <td>{{ $role->guard_name }}</td>
                    <td>   
                      @if(Auth::user()->hasPermissionTo('Editar role') || Auth::user()->hasRole('Administrador'))                   
                        <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-info rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                            <i class="fas fa-pencil-alt fa-sm"></i>
                        </a>
                      @endif
                      @if(Auth::user()->hasPermissionTo('Eliminar role') || Auth::user()->hasRole('Administrador'))
                        @if($role->id !== 1)
                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display: inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger rounded-circle" id="deleteButton" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                                <i class="fas fa-trash-alt fa-sm"></i>
                            </button>
                        </form>
                        @endif
                      @endif
                    </td>
                  </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
      @include('admin.partials.footer')
  </div>
@endsection
@push('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush
@push('js')
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('js/data-dataTable.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.all.min.js"></script>
  <script>
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
  </script>
@endpush