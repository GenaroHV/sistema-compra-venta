@role('Administrador')
<form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
  @csrf @method('PUT')
    <div class="border rounded" style="height: 100px; width: 100%; overflow-y: scroll;">
      @include('admin.modulo-admin.permisos.checkboxes', ['model' => $user])
    </div>       
    <div class="form-group row mt-3">
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