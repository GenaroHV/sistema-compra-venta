<li class="nav-item has-treeview {{ setActivarMenu('admin/proveedores*') }}">
    <a href="#" class="nav-link {{ setActivarLink('admin/proveedores*') }}">
        <i class="fas fa-shipping-fast"></i>
        <p>
            Proveedores
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.proveedores.create') }}" class="nav-link {{ setActivarLink('admin/proveedores/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.proveedores.index') }}" class="nav-link {{ setActivarLink('admin/proveedores') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Listar</p>
            </a>
        </li>
    </ul>
</li>