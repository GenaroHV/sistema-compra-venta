<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="{{ route('admin.configurar')}}" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Configuraciones">
          <i class="fas fa-cogs"></i>   
        </a>
      </li>
      <notificacion :notifications="notifications"></notificacion>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          @if(Auth::user()->avatar != null)
              <img class="user-image img-circle elevation-2" alt="{{ Auth::user()->name }}" src="/storage/{{ Auth::user()->avatar }}">
          @else
              <img class="user-image img-circle elevation-2" alt="{{ Auth::user()->name }}" src="{{ asset('img/users/user-default.png') }}">
          @endif
          <span class="d-none d-md-inline">{{ Auth::user()->name}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            @if(Auth::user()->avatar != null)
              <img class="img-circle elevation-2" alt="{{ Auth::user()->name }}" src="/storage/{{ Auth::user()->avatar }}">
            @else
                <img class="img-circle elevation-2" alt="{{ Auth::user()->name }}" src="{{ asset('img/users/user-default.png') }}">
            @endif
            <p>
              {{ Auth::user()->name}}
            <small>Miembro desde {{ Auth::user()->created_at->format('d-m-Y')}}</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{ route('admin.users.show', auth()->user()) }}" class="btn btn-default btn-flat">Perfil</a>
            <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </li>
    </ul>
</nav>