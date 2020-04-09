<div class="modal fade" id="crearCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Crear Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form role="form" action="{{ route('admin.categorias.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="modal-body">

          <div class="form-group">
            <label for="nombre">Nombre*</label>
            <input id="categoria-nombre" type="text"
              class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre"
              value="{{ old('nombre', $model->nombre )}}" required>
            {!! $errors->first('nombre', '<span class="error invalid-feedback">:message</span>') !!}
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" rows="6"
              class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : ''}}">{{ old('nombre', $model->descripcion )}}</textarea>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary">Aceptar</button>
        </div>
      </form>

    </div>
  </div>
</div>