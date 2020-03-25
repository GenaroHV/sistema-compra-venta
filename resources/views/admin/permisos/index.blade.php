@extends('layouts.app')
@section('titulo', 'Listado de Permisos')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-6 ml-auto mr-auto">
                  <h1 class="m-0 text-dark text-center">Lista de Permisos</h1>
              </div>
          </div>
      </div>
  </div>
  <section class="content">
    <div class="container-fluid">         
        <div class="row">
            <div class="col-12 col-md-9 ml-auto mr-auto">
                <div class="card">
                    <div class="card-body">
                      <div class=" table-responsive py-4">
                        <table id="table-posts" class="table table-flush">
                          <thead class="thead-light">
                            <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Guard</th>                    
                              <th>Acciones</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                              <td>{{ $permission->id }}</td>
                              <td>{{ $permission->name}}</td>        
                              <td>{{ $permission->guard_name }}</td>
                              <td>      
                                  
                                  <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-info rounded-circle" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">
                                      <i class="fas fa-pencil-alt fa-sm"></i>
                                  </a>
                                  
                              </td>
                            </tr>
                            @endforeach
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>
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