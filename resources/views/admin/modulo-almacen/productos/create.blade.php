<div class="modal fade" id="crearProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form role="form" action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
          @csrf @method('POST')

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="codigo">Código*</label>
                <input required id="producto-serie" type="text" class="form-control {{ $errors->has('codigo') ? 'is-invalid' : ''}}" name="codigo" placeholder="Ingresar un código" value="{{ old('codigo', $model->codigo) }}">
                {!! $errors->first('codigo', '<span class="error invalid-feedback">:message</span>') !!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nombre">Nombre*</label>
                <input type="text" placeholder="Ingresar un nombre" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre"
                  value="{{ old('nombre', $model->nombre )}}" required>
                {!! $errors->first('nombre', '<span class="error invalid-feedback">:message</span>') !!}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" rows="4" placeholder="Ingresar una descripción"
                  class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : ''}}">{{ old('descripcion', $model->descripcion )}}</textarea>
              </div>
            </div>            
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label">Categoria*</label>
                <select name="categorias[]" class="form-control js-example-basic-single" required>
                  <option value="" disabled selected hidden>Selecciona una categoria</option>
                  @foreach ($categorias as $categoria)
                  <option value="{{ $categoria->id }}" placeholder="Seleccion">
                    {{ $categoria->nombre }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="precio">Precio*</label>
                <input required type="text" class="form-control {{ $errors->has('precio') ? 'is-invalid' : ''}}" name="precio" placeholder="00.00" value="{{ old('precio', $model->precio )}}">
                {!! $errors->first('precio', '<span class="error invalid-feedback">:message</span>') !!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Imagen del Producto</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="avatar" lang="es">
                  <label class="custom-file-label" for="avatar">Selecciona archivo</label>
                </div>
              </div>
            </div>
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