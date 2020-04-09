<li class="nav-item has-treeview {{ setActivarMenu('admin/categorias*') }}">
    <a href="#" class="nav-link {{ setActivarLink('admin/categorias*') }}">
        <i class="fas fa-tags"></i>
        <p>
            Categorias
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">           
            <a href="{{ route('admin.categorias.index', '#crear') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear</p>
            </a>            
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.categorias.index') }}" class="nav-link {{ setActivarLink('admin/categorias') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Listar</p>
            </a>
        </li>
    </ul>
</li>