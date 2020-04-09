@if(auth()->user()->hasRole('Administrador') || auth()->user()->can('Ver Producto'))
    <a href="#" class="btn btn-info rounded-circle mr-1" 
    style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;"
    data-toggle="modal" data-target="#verProductoModal{{ $model->id }}">
        <i class="fas fa-eye fa-sm"></i>
    </a>
@endif
@if(auth()->user()->hasRole('Administrador') || auth()->user()->can('Editar Producto'))
    <a href="#" class="btn btn-success rounded-circle mr-1" 
    style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;"     
    data-toggle="modal" data-target="#actualizarProductoModal{{ $model->id }}">
        <i class="fas fa-pencil-alt fa-sm"></i>
    </a>
@endif
@if(auth()->user()->hasRole('Administrador') || auth()->user()->can('Eliminar Producto'))

    <form action="{{ route('admin.productos.destroy', $model) }}" method="POST" style="display: inline">
        @csrf {{ method_field('DELETE') }}
    
        <button class="btn btn-danger rounded-circle" id="deleteButton" 
        style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" 
        data-toggle="tooltip" data-placement="top" title="Eliminar producto">
            <i class="fas fa-trash-alt fa-sm"></i>
        </button>
    </form>

@endif