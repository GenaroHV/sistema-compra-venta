<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ count($categoria) }}</h3>
                <p>Categorías</p>
            </div>
            <div class="icon">
                <i class="fas fa-tags"></i>
            </div>
            <a href="{{ route('admin.categorias.index') }}" class="small-box-footer">Leer más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ count($producto) }}</h3>
                <p>Productos</p>
            </div>
            <div class="icon">
                <i class="fas fa-box-open"></i>
            </div>
            <a href="{{ route('admin.productos.index') }}" class="small-box-footer">Leer más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner text-white">
                <h3>{{ count($cliente) }}</h3>
                <p>Clientes</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <a href="{{ route('admin.clientes.index') }}" class="small-box-footer" style="color: white !important;">Leer más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ count($proveedor) }}</h3>
                <p>Proveedores</p>
            </div>
            <div class="icon">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <a href="{{ route('admin.proveedores.index') }}" class="small-box-footer">Leer más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
  
</div>