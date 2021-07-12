@foreach ($productos as $producto)
<div class="modal fade" id="actualizarProductoModal{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Prodcuto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="modal-body">          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control" name="codigo" value="{{ old('codigo', $producto->codigo) }}">

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre"
                  value="{{ old('nombre', $producto->nombre )}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" rows="4"
                  class="form-control">{{ old('descripcion', $producto->descripcion )}}</textarea>
              </div>
            </div>            
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Categoria</label>
                <select name="categorias[]" class="form-control js-example-basic-single" required>
                  <option value="" selected hidden>Selecciona una categoria</option>
                  @foreach ($categorias as $categoria)
                  <option {{ collect(old('categorias', $producto->categorias->pluck('id')))->contains($categoria->id) ? 'selected' :'' }} value="{{ $categoria->id }}" placeholder="Seleccion">
                    {{ $categoria->nombre }}
                </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="precio">Precio</label>
                <input required type="text" class="form-control" name="precio" value="{{ old('precio', $producto->precio )}}">
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
@endforeach