@extends('backend.layouts.app')
@section('title', 'Usuarios')
@section('content')
    <div class="box-content">
        <div class="box-heading">
            <div class="box-title">
                <h3 class="mb-35">@yield('title')</h3>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class="icon-home" href="{{ route('backend.dashboard.index') }}">Dashboard</a></li>
                        <li><a class="sub-breadcrumb" href="{{ route('backend.users.index') }}">@yield('title')</a></li>
                        <li><span>Ver Usuario</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <h6 class="color-text-paragraph-2 mb-30">Detalles del usuario ID {{ $user->id_formatted }}</h6>
                                <div class="box-profile-image">
                                    <div class="img-profile">
                                        <a href="{{ $user->photo_url }}" target="_blank">
                                            <img src="{{ $user->photo_url }}" alt="jobBox" id="photo-preview" class="photo-placeholder">
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Nombre(s) *</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                                                   disabled>
                                            @error('name')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Apellido(s) *</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                   value="{{ $user->last_name }}" disabled>
                                            @error('last_name')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Correo Electrónico *</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                                                   disabled>
                                            @error('email')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Tipo de Usuario *</label>
                                            <select name="type" id="type" class="form-control" disabled>
                                                <option value="Company" @if($user->type == 'Company') selected @endif>Empresa</option>
                                                <option value="Client" @if($user->type == 'Client') selected @endif>Cliente</option>
                                                <option value="Candidate" @if($user->type == 'Candidate') selected @endif>Candidato</option>
                                                @if(auth()->user()->type == 'Administrator')
                                                    <option value="Administrator" @if($user->type == 'Administrator') selected @endif>
                                                        Administrador
                                                    </option>
                                                @endif
                                            </select>
                                            @error('type')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Estado *</label>
                                            <select name="is_active" id="is_active" class="form-control" disabled>
                                                <option value="1" @if($user->is_active == '1') selected @endif>Activo</option>
                                                <option value="0" @if($user->is_active == '0') selected @endif>Inactivo</option>
                                            </select>
                                            @error('is_active')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mt-0 mb-0">

                                            <a href="{{ route('backend.users.edit', ['user' => $user->id]) }}" class="btn btn-primary me-3">
                                                Editar
                                            </a>
                                            <form action="{{ route('backend.users.delete', ['user' => $user->id]) }}" method="POST"
                                                  class="d-inline" onsubmit="return confirm('Confirmar');">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="btn btn-danger me-3" onclick="$(this).parent().submit();">
                                                    Eliminar
                                                </a>
                                            </form>
                                            <a href="{{ route('backend.users.index') }}" class="btn btn-outline-primary me-3">
                                                Cancelar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
