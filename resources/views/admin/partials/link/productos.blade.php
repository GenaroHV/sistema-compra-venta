<li class="nav-item has-treeview {{ setActivarMenu('admin/productos*') }}">
    <a href="#" class="nav-link {{ setActivarLink('admin/productos*') }}">
        <i class="fas fa-box-open"></i>
        <p>
            Productos
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.productos.create') }}" class="nav-link {{ setActivarLink('admin/productos/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.productos.index') }}" class="nav-link {{ setActivarLink('admin/productos') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Listar
                </p>
            </a>
        </li>
    </ul>
</li>