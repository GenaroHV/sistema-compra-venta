<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $categoria }}</h3>
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
                <h3>{{ $producto }}</h3>
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
                <h3>{{ $cliente }}</h3>
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
                <h3>{{ $proveedor }}</h3>
                <p>Proveedores</p>
            </div>
            <div class="icon">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <a href="{{ route('admin.proveedores.index') }}" class="small-box-footer">Leer más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
  
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-indigo elevation-1">
            <i class="fas fa-shopping-basket"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Compras Registradas</span>
          <span class="info-box-number">            
            {{ $compra_registrado }}            
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-pink elevation-1">
            <i class="fas fa-thumbs-up fa-rotate-180"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Compras Anuladas</span>
          <span class="info-box-number">
            {{ $compra_anulado }} 
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-indigo elevation-1">
            <i class="fas fa-shopping-cart"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Ventas Registradas</span>
          <span class="info-box-number">
            {{ $venta_registrado }} 
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-pink elevation-1">
            <i class="fas fa-thumbs-up fa-rotate-180 text-white"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Ventas Anuladas</span>
          <span class="info-box-number">
            {{ $venta_anulado }} 
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>