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
            <div class="row justify-content-center">
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
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
                        </div>
                    </div>    
                </div>
                <div class="col-12 col-md-4">
                  <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                          <div class="text-center">
                              <h3>Autorización</h3>
                          </div>                          
                          <ul class="list-group list-group-unbordered mb-3">
                              @forelse ($user->roles as $role)
                                <li class="list-group-item">
                                    <b>Rol</b> <p class="float-right">{{ $role->name }}</p>
                                </li> 
                                @if($role->permissions->count())
                                  <li class="list-group-item">
                                      <b>Permisos</b> <p class="float-right">{{ $role->permissions->pluck('name')->implode(', ') }}</p>
                                  </li>
                                @endif
                              @empty
                                  <p class="text-muted">No hay autorización disponible</p>
                              @endforelse
                          </ul>
                      </div>
                  </div>    
                </div>
                <div class="col-12 col-md-4">
                  <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                          <div class="text-center">
                              <h3>Permisos adicionales</h3>
                          </div>                          
                          <ul class="list-group list-group-unbordered mb-3">
                              @forelse ($user->permissions as $permission)
                                <li class="list-group-item">
                                  {{ $permission->name }}
                                </li>
                                @empty
                                <p class="text-muted">No hay permisos adicionales</p>
                              @endforelse
                          </ul>
                      </div>
                  </div>    
                </div>
                @include('admin.partials.regresar2')
            </div>
        </div>
    </section>
</div>
@stop

@push('css')

@endpush
@push('js')

@endpush
