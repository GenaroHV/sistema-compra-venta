@role('Administrador')
<form method="POST" action="{{ route('admin.users.roles.update', $user)}}">
  @csrf @method('PUT')
    @include('admin.roles.checkboxes')
    <div class="form-group row">
      <div class="offset-sm-6 col-sm-6">
        <button class="btn btn-primary btn-block">Actualizar Roles</button>
      </div>
    </div>
</form>
@else
  <ul class="list-group">
      @forelse ($user->roles as $role)
          <li class="list-group-item">{{ $role->name }}</li>
      @empty
          <li class="list-group-item">No tienes roles</li>
      @endforelse
  </ul>
@endrole