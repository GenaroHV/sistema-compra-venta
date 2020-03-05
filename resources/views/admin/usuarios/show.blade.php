@extends('layouts.app')
@section('titulo', 'Perfil Usuario')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6 ml-auto mr-auto">
                    <h1 class="m-0 text-dark text-center">Perfil</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if($user->avatar != null)
                                    <img class="rounded-circle shadow-lg" alt="{{ $user->name }}" src="/storage/{{ $user->avatar }}" height="140px" width="140px">
                                @else
                                    <img class="rounded-circle shadow-lg" alt="{{ $user->name }}" src="{{ asset('img/users/user-default.png') }}" height="140px" width="140px">
                                @endif
                            </div>        
                            <h3 class="profile-username text-center">{{ $user->name }}</h3>        
                            <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>        
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email:</b> <a class="float-right">{{ $user->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Roles</b> 
                                    <a class="float-right">
                                        @if($user->roles->count())
                                        {{ $user->getRoleNames()->implode(', ') }}
                                        @endif
                                    </a>
                                </li>
                            </ul>        
                            <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
                        </div>
                    </div>    
                </div>
                <div class="col-12 col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                          <ul class="nav nav-pills">                            
                            <li class="nav-item"><a class="nav-link active" href="#historial" data-toggle="tab">Historial</a></li>
                            <li class="nav-item"><a class="nav-link" href="#editar" data-toggle="tab">Editar</a></li>
                          </ul>
                        </div>
                        <div class="card-body">
                          <div class="tab-content">

                            <div class="active tab-pane" id="historial">
                              <div class="timeline timeline-inverse">
                                <div class="time-label">
                                  <span class="bg-danger">
                                    10 Feb. 2014
                                  </span>
                                </div>                                
                                <div>
                                    <i class="fas fa-user bg-info"></i>          
                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>          
                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request</h3>
                                    </div>
                                </div>                                
                              </div>
                            </div>
          
                            <div class="tab-pane" id="editar">
                              <form class="form-horizontal">
                                <div class="form-group row">
                                  <label for="inputName" class="col-sm-3 col-form-label">Nombre</label>
                                  <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputName" placeholder="Nombre">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                  <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="avatar" class="col-sm-3 col-form-label">Avatar</label>
                                  <div class="col-sm-9">
                                    <input type="file" name="avatar" class="form-control" style="padding-bottom: 0px; padding-top: 3px;">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="password" class="col-sm-3 col-form-label">Contraseña</label>
                                  <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="passwordTwo" class="col-sm-3 col-form-label">Repite la Contraseña</label>
                                    <div class="col-sm-9">
                                      <input type="password" class="form-control" id="passwordTwo">
                                    </div>
                                  </div>
                                <div class="form-group row">
                                  <div class="offset-sm-6 col-sm-6">
                                    <button type="submit" class="btn btn-danger btn-block">Actualizar</button>
                                  </div>
                                </div>
                              </form>
                            </div>

                          </div>
                          
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop

@push('css')

@endpush
@push('js')

@endpush
