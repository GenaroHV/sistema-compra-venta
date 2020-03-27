<li class="nav-item has-treeview {{ setActivarMenu('admin/compras*') }}">
    <a href="#" class="nav-link {{ setActivarLink('admin/compras*') }}">
        <i class="fas fa-shopping-basket"></i>
        <p>
            Compras
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.compras.create') }}" class="nav-link {{ setActivarLink('admin/compras/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.compras.index') }}" class="nav-link {{ setActivarLink('admin/compras') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Listar</p>
            </a>
        </li>
    </ul>
</li>