@role('Administrador')
<form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
  @csrf @method('PUT')
    @include('admin.permisos.checkboxes', ['model' => $user])
    <div class="form-group row">
      <div class="offset-sm-6 col-sm-6">
        <button class="btn btn-primary btn-block">Actualizar Permisos</button>
      </div>
    </div>
</form>
@else
    <ul class="list-group">
        @forelse ($user->permissions as $permission)
            <li class="list-group-item">{{ $permission->name }}</li>
        @empty
            <li class="list-group-item">No tienes permisos</li>
        @endforelse
    </ul>
@endrole