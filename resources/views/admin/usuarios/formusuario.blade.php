<form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
  @csrf @method('PUT')
    <div class="form-group row">
      <label for="name" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
      <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('nombre', $user->name) }}">
      </div>
    </div>    
    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label">Email</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('nombre', $user->email) }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="avatar" class="col-sm-3 col-form-label">Avatar</label>
      <div class="col-sm-9">
        <input type="file" name="avatar" class="form-control" style="padding-bottom: 0px; padding-top: 3px;">
      </div>
    </div>
    <div class="form-group row">
        <label for="username" class="col-sm-3 col-form-label">Nombre de Usuario</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="username" placeholder="Nombre de usuario" value="{{ old('username', $user->username) }}">
        </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-sm-3 col-form-label">Contraseña</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" name="password" placeholder="Contraseña">
      </div>
    </div>
    <div class="form-group row">
        <label for="password_confirmation" class="col-sm-3 col-form-label">Repite la Contraseña</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Repite la contraseña">
        </div>
      </div>
    <div class="form-group row">
      <div class="offset-sm-6 col-sm-6">
        <button class="btn btn-primary btn-block">Actualizar</button>
      </div>
    </div>
  </form>