@extends('backend.layouts.app')
@section('title', 'Ofertas')
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
                        <li><a class="sub-breadcrumb" href="{{ route('backend.offers.index') }}">@yield('title')</a></li>
                        <li><span>Editar Oferta</span></li>
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
                                <h6 class="color-text-paragraph-2 mb-30">Complete el formulario para modificar esta oferta</h6>
                                <form action="{{ route('backend.offers.update', ['offer' => $offer->id]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    @method('PATCH')

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Titulo</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ $offer->title }}"
                                                       required>
                                                @error('title')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Ubicación</label>
                                                <select name="city_id" id="city_id" class="form-control" required>
                                                    <option value="" selected disabled>Seleccione una ciudad</option>
                                                    @foreach($departments as $department)
                                                        <optgroup label="{{ $department->name }}">
                                                            @foreach($department->cities as $city)
                                                                <option value="{{ $city->id }}"
                                                                        @if($city->id == $offer->city_id) selected @endif>
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
                                                <label class="font-sm color-text-mutted mb-10">Tipo de Trabajo</label>
                                                <select name="job_type_id" id="job_type_id" class="form-control" required>
                                                    <option value="" selected disabled>Seleccione una ciudad</option>
                                                    @foreach($job_types as $job_type)
                                                        <option value="{{ $job_type->id }}"
                                                                @if($job_type->id == $offer->job_type_id) selected @endif>
                                                            {{ $job_type->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('job_type_id')
                                                <span class="validation-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Experiencia Requerida</label>
                                                <select name="experience_id" id="experience_id" class="form-control" required>
                                                    <option value="" selected disabled>Seleccione una ciudad</option>
                                                    @foreach($experiences as $experience)
                                                        <option value="{{ $experience->id }}"
                                                                @if($experience->id == $offer->experience_id) selected @endif>
                                                            {{ $experience->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('experience_id')
                                                <span class="validation-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Descripción</label>
                                                <textarea name="description" id="description" class="form-control" cols="30" rows="12"
                                                          required>{{ $offer->description }}</textarea>
                                                @error('description')<span
                                                        class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Salario (opcional)</label>
                                                <input type="number" class="form-control" id="salary" name="salary"
                                                       value="{{ $offer->salary }}">
                                                @error('salary')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Estado *</label>
                                                <select name="is_active" id="is_active" class="form-control" required>
                                                    <option value="1" @if($offer->is_active == '1') selected @endif>Activo</option>
                                                    <option value="0" @if($offer->is_active == '0') selected @endif>Inactivo</option>
                                                </select>
                                                @error('is_active')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Categorías</label>
                                                @foreach($categories as $category)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                                               id="category-{{ $category->id }}" name="category_ids[]" @if(in_array($category->id, $offer->offerCategories->pluck('category_id')->toArray())) checked @endif>
                                                        <label class="form-check-label" for="category-{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                @error('category_ids')<span
                                                        class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mt-0 mb-0">
                                                <button type="submit" class="btn btn-primary me-3">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('backend.offers.index') }}" class="btn btn-outline-primary me-3">
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
