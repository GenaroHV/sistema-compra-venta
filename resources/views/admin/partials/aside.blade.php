<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
    <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SAJHOM</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->avatar != null)
              <img class="user-image img-circle elevation-2" alt="{{ Auth::user()->name }}" src="/storage/{{ Auth::user()->avatar }}">
          @else
              <img class="user-image img-circle elevation-2" alt="{{ Auth::user()->name }}" src="{{ asset('img/users/user-default.png') }}">
          @endif
        </div>
        <div class="info">
          @role('Administrador')
            <a href="{{ url('/admin/users') }}" class="d-block">{{ Auth::user()->name}}</a>
          @else
            <a href="{{ route('admin.users.show', auth()->user()) }}" class="d-block">{{ Auth::user()->name}}</a>
          @endrole
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/admin') }}" class="nav-link {{ setActivarLink('admin') }}">
              <i class="fas fa-home"></i>
              <p>Panel Principal</p>
            </a>
          </li>
          
          <li class="nav-header">ALMACEN</li>
          @include('admin.partials.link.categorias')
          @include('admin.partials.link.productos')
          <li class="nav-header">COMPRAS</li>
          @include('admin.partials.link.compras')
          @include('admin.partials.link.proveedores')
          <li class="nav-header">VENTAS</li>
          @include('admin.partials.link.ventas')
          @include('admin.partials.link.clientes')
          {{-- 
          <li class="nav-header">REPORTES</li>
          @include('admin.partials.link.reportes')
          --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>