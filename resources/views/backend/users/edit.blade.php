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
                        <li><span>Editar Usuario</span></li>
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
                                <h6 class="color-text-paragraph-2 mb-30">Complete el formulario para modificar este usuario</h6>
                                <form action="{{ route('backend.users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    @method('PATCH')

                                    <div class="box-profile-image">
                                        <div class="img-profile">
                                            <img src="{{ $user->photo_url }}" alt="jobBox" id="photo-preview"
                                                 class="photo-placeholder">
                                        </div>
                                        <div class="info-profile">
                                            <input type="file" id="photo" name="photo" class="form-control mb-4" hidden>
                                            <a class="btn btn-default" id="btn-select-photo">Subir Foto</a>
                                            <a class="btn btn-link" id="btn-remove-photo">Remover</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Nombre(s) *</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                                                       required>
                                                @error('name')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Apellido(s) *</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                       value="{{ $user->last_name }}" required>
                                                @error('last_name')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Correo Electrónico *</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                                                       required>
                                                @error('email')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Tipo de Usuario *</label>
                                                <select name="type" id="type" class="form-control" required>
                                                    <option value="Company" @if($user->type == 'Company') selected @endif>Empresa</option>
                                                    <option value="Client" @if($user->type == 'Client') selected @endif>Cliente</option>
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
                                                <label class="font-sm color-text-mutted mb-10">Contraseña</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                                @error('password')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Confirmar Contraseña</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                       name="password_confirmation">
                                                @error('password_confirmation')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Estado *</label>
                                                <select name="is_active" id="is_active" class="form-control" required>
                                                    <option value="1" @if($user->is_active == '1') selected @endif>Activo</option>
                                                    <option value="0" @if($user->is_active == '0') selected @endif>Inactivo</option>
                                                </select>
                                                @error('is_active')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mt-0 mb-0">
                                                <button type="submit" class="btn btn-primary me-3">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('backend.users.index') }}" class="btn btn-outline-primary me-3">
                                                    Cancelar
                                                </a>
                                            </div>
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
@endsection

@section('scripts')
    <script>
        $('#btn-select-photo').on('click', function () {
            $('#photo').click();
        })

        $('#btn-remove-photo').on('click', function () {
            $('#photo').val('');
            $('#photo-preview').attr('src', '{{ asset('assets/backend/imgs/photo-placeholder.jpg') }}');
        });

        $("#photo").change(function () {
            readPhotoURL(this);
        });

        function readPhotoURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
