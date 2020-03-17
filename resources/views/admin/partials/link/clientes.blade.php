<li class="nav-item has-treeview {{ setActivarMenu('admin/clientes*') }}">
    <a href="#" class="nav-link {{ setActivarLink('admin/clientes*') }}">
        <i class="fas fa-user-tie"></i>
        <p>
            Clientes
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.clientes.create') }}" class="nav-link {{ setActivarLink('admin/clientes/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.clientes.index') }}" class="nav-link {{ setActivarLink('admin/clientes') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    Listar
                </p>
            </a>
        </li>
    </ul>
</li>