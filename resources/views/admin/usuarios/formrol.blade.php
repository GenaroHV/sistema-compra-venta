@role('Administrador')
<form method="POST" action="{{ route('admin.users.roles.update', $user)}}">
  @csrf @method('PUT')
    @foreach($roles as $role)
    <div class="custom-control custom-checkbox">
        <input name="roles[]" value="{{ $role->name }}" id="checkRol{{ $role->id }}" type="checkbox" class="custom-control-input" {{ $user->roles->contains($role->id) ? 'checked' : ''}}>
        <label class="custom-control-label" for="checkRol{{ $role->id }}">{{ $role->name }}</label>
        <br>
        <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
    </div>
    @endforeach
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