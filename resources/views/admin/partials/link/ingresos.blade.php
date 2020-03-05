<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-circle"></i>
        <p>
            Ingresos
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.ingresos.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.ingresos.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Listar</p>
            </a>
        </li>
    </ul>
</li>