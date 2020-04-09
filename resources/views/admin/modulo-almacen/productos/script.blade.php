$(document).ready(function() {
    $('#tabla-productos').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip();
    })
    $('#tabla-productos').on('click', "#deleteButton", function(e){
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

    $('#tabla-productos').DataTable({
      "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ productos",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando productos del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando productos del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ productos)",
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
        "ajax": "{{ route('api.productos.index') }}",
        "columns" : [
          {data: 'id', name: 'id'},
          {data: 'avatar', name: 'avatar'},
          {data: 'codigo', name: 'codigo'},
          {data: 'nombre', name: 'nombre'},
          {data: 'stock', name: 'stock'},
          {data: 'descripcion', name: 'descripcion'},
          {data: 'precio', name: 'precio'},
          {data: 'categorias', name: 'categorias.nombre'},
          {data: 'action', name: 'action'}        
        ]
    });
});