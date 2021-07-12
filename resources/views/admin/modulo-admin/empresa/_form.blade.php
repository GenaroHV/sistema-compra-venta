<form role="form" action="{{ route('admin.empresa.update', 1) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="razon_social">Razón Social*</label>
                        <input required type="text" class="form-control" name="razon_social" placeholder="Mi Empresa S.A." value="{{ old('razon_social',  $empresa->first()->razon_social) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="propietario">Propietario*</label>
                        <input required type="text" class="form-control" name="propietario" placeholder="Juan Perez" value="{{ old('propietario',  $empresa->first()->propietario) }}">
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ruc">RUC*</label>
                        <input required type="number" class="form-control" name="ruc" placeholder="1087654321" value="{{ old('ruc',  $empresa->first()->ruc) }}">
                    </div>
                </div>                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="number" class="form-control" name="telefono" placeholder="99999999" value="{{ old('telefono',  $empresa->first()->telefono) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" name="email" placeholder="hola@empresa.com" value="{{ old('email',  $empresa->first()->email) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Logotipo</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="logo" lang="es">
                          <label class="custom-file-label" for="logo">Selecciona un logotipo</label>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="moneda">Moneda</label>
                        <input type="text" class="form-control" name="moneda" placeholder="S/." value="{{ old('moneda',  $empresa->first()->moneda) }}">
                    </div>
        
                    <div class="form-group">
                        <label for="igv">Impuesto</label>
                        <input type="number" class="form-control" name="igv" placeholder="18" value="{{ old('igv',  $empresa->first()->igv) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block">ACTUALIZAR</button>
                </div>
            </div>
        </div>
    </div>
  </form>