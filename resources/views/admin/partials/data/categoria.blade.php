$(document).ready(function() {
    $('#tabla-categoria').on('click', "#deleteButton", function(e){
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
    $('#tabla-categoria').DataTable({
      "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ categorias",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando categorias del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando categorias del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ categorias)",
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
        "order": [[ 0, "desc" ]],
        "pageLength": 10,
        "lengthMenu": [10, 25, 50, 100],
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('api.categorias.index') }}",
        "columns" : [
          {data: 'id'},
          {data: 'nombre'},
          {data: 'descripcion'},
          {data: 'acciones'},
          
        ],
        columnDefs: [{
          targets: -1,
          render: function(data, type, row){
            return '<a href="/{{ request()->segment(1) }}/categorias/' + row['id'] + '/edit" class="btn btn-success rounded-circle mr-1" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;"><i class="fas fa-pencil-alt fa-sm"></i></a>' +
            '<form action="/{{ request()->segment(1) }}/categorias/' + row['id'] + '" method="POST" style="display: inline">' +
            '<input type="hidden" name="_method" value="DELETE">' +
            '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
            '<button type="submit" id="deleteButton" class="btn btn-danger rounded-circle" value="eliminar" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;"><i class="fas fa-trash-alt fa-sm"></i></button>' +
            '</form>';
          }
        }]
    });
  });