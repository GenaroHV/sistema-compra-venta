<li class="nav-item has-treeview {{ setActivarMenu('admin/ventas*') }}">
    <a href="#" class="nav-link {{ setActivarLink('admin/ventas*') }}">
        <i class="fas fa-shopping-cart"></i>
        <p>
            Ventas
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.ventas.create') }}" class="nav-link {{ setActivarLink('admin/ventas/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.ventas.index') }}" class="nav-link {{ setActivarLink('admin/ventas') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Listar</p>
            </a>
        </li>
    </ul>
</li>