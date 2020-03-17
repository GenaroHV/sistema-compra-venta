@foreach($roles as $role)
    <div class="custom-control custom-checkbox">
        <input name="roles[]" value="{{ $role->name }}" id="checkRol{{ $role->id }}" type="checkbox" class="custom-control-input" {{ $user->roles->contains($role->id) ? 'checked' : ''}}>
        <label class="custom-control-label" for="checkRol{{ $role->id }}">{{ $role->name }}</label>
        <br>
        <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
    </div>
@endforeach