{{-- PERMISOS Y ROLES --}}
@if(auth()->user()->hasRole('Administrador') || auth()->user()->can('Editar Categoria'))
    <a href="#" class="btn btn-success rounded-circle mr-1" 
    style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" 
     
    data-toggle="modal" data-target="#actualizarCategoriaModal{{ $model->id }}">
        <i class="fas fa-pencil-alt fa-sm"></i>
    </a>
@endif
@if(auth()->user()->hasRole('Administrador') || auth()->user()->can('Eliminar Categoria'))

    <form action="{{ route('admin.categorias.destroy', $model) }}" method="POST" style="display: inline">
        @csrf {{ method_field('DELETE') }}
    
        <button class="btn btn-danger rounded-circle" id="deleteButton" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Eliminar categoría">
            <i class="fas fa-trash-alt fa-sm"></i>
        </button>
    </form>

@endif