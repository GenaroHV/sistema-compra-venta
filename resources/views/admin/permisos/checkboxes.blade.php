@foreach($permissions as $id => $name)
    <div class="custom-control custom-checkbox ml-1">
        <input name="permissions[]" type="checkbox" value="{{ $name }}" 
            id="checkPermission{{ $id }}" class="custom-control-input" 
            {{ $model->permissions->contains($id) || collect(old('permissions'))->contains($name) ? 'checked' : ''}}>            
        <label class="custom-control-label" for="checkPermission{{ $id }}">{{ $name }}</label>
    </div>
@endforeach