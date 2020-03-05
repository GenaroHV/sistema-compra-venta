<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
    <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SISCOVEN</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ url('/') . '/'. Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/admin') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Panel Principal</p>
            </a>
          </li>
          <li class="nav-header">ALMACEN</li>
          @include('admin.partials.link.categorias')
          @include('admin.partials.link.productos')
          <li class="nav-header">COMPRAS</li>
          @include('admin.partials.link.ingresos')
          @include('admin.partials.link.proveedores')
          <li class="nav-header">VENTAS</li>
          @include('admin.partials.link.ventas')
          @include('admin.partials.link.clientes')
          <li class="nav-header">REPORTES</li>
          @include('admin.partials.link.reportes')
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>