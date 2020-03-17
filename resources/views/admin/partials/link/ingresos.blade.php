<li class="nav-item has-treeview {{ setActivarMenu('admin/ingresos*') }}">
    <a href="#" class="nav-link {{ setActivarLink('admin/ingresos*') }}">
        <i class="fas fa-shopping-basket"></i>
        <p>
            Ingresos
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.ingresos.create') }}" class="nav-link {{ setActivarLink('admin/ingresos/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.ingresos.index') }}" class="nav-link {{ setActivarLink('admin/ingresos') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Listar</p>
            </a>
        </li>
    </ul>
</li>