@extends('backend.layouts.app')
@section('title', 'Empresas')
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
                        <li><a class="sub-breadcrumb" href="{{ route('backend.companies.index') }}">@yield('title')</a></li>
                        <li><span>Editar Empresa</span></li>
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
                                <h6 class="color-text-paragraph-2 mb-30">Complete el formulario para modificar esta empresa</h6>
                                <form action="{{ route('backend.companies.update', ['company' => $company->id]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    @method('PATCH')

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="box-profile-image">
                                                <div class="img-profile">
                                                    <img src="{{ $company->photo_url }}" alt="jobBox"
                                                         id="photo-preview"
                                                         class="photo-placeholder">
                                                </div>
                                                <div class="info-profile">
                                                    <input type="file" id="photo" name="photo" class="form-control mb-4" hidden>
                                                    <a class="btn btn-default" id="btn-select-photo">Subir Foto</a>
                                                    <a class="btn btn-link" id="btn-remove-photo">Remover</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box-profile-image">
                                                <div class="img-profile">
                                                    <img src="{{ $company->banner_url }}" alt="jobBox"
                                                         id="banner-preview"
                                                         class="banner-placeholder">
                                                </div>
                                                <div class="info-profile">
                                                    <input type="file" id="banner" name="banner" class="form-control mb-4" hidden>
                                                    <a class="btn btn-default" id="btn-select-banner">Subir Banner</a>
                                                    <a class="btn btn-link" id="btn-remove-banner">Remover</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Nombre</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}"
                                                       required>
                                                @error('name')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Descripción</label>
                                                <input type="text" class="form-control" id="description" name="description"
                                                       value="{{ $company->description }}" required>
                                                @error('description')<span
                                                        class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Categoría</label>
                                                <select name="category_id" id="category_id" class="form-control" required>
                                                    <option value="" selected disabled>Seleccione una categoría</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                                @if($category->id == $company->category_id) selected @endif>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Página Web /  Sitio Web</label>
                                                <input type="text" class="form-control" id="website" name="website" value="{{ $company->website }}"
                                                       required>
                                                @error('website')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Correo Electrónico</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}"
                                                       required>
                                                @error('email')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Teléfono</label>
                                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $company->telephone }}"
                                                       required>
                                                @error('telephone')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Departamento, Ciudad</label>
                                                <select name="city_id" id="city_id" class="form-control" required>
                                                    <option value="" selected disabled>Seleccione una ciudad</option>
                                                    @foreach($departments as $department)
                                                        <optgroup label="{{ $department->name }}">
                                                            @foreach($department->cities as $city)
                                                                <option value="{{ $city->id }}"
                                                                        @if($city->id == $company->city_id) selected @endif>
                                                                    {{ $city->name }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                                @error('city_id')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Dirección</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                       value="{{ $company->address }}"
                                                       required>
                                                @error('address')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mt-0 mb-0">
                                                <button type="submit" class="btn btn-primary me-3">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('backend.companies.index') }}" class="btn btn-outline-primary me-3">
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

        $('#btn-select-banner').on('click', function () {
            $('#banner').click();
        })

        $('#btn-remove-banner').on('click', function () {
            $('#banner').val('');
            $('#banner-preview').attr('src', '{{ asset('assets/backend/imgs/banner-placeholder.jpg') }}');
        });

        $("#banner").change(function () {
            readBannerURL(this);
        });

        function readBannerURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#banner-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
