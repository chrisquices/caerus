@extends('backend.layouts.app')
@section('title', 'Aplicaciones')
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
                        <li><span>Ver Aplicación</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="section-box">
                    <div class="container">
                        <div class="panel-white mb-30">
                            <div class="box-padding">
                                <div class="box-nav-tabs mb-5 d-flex">
                                    <ul class="nav nav-tabs" role="tablist"
                                        style="display: flex !important; flex-wrap: wrap !important; padding-left: 0 !important; margin-bottom: 0 !important; list-style: none !important; max-width: 100% !important; padding-top: 0 !important;">
                                        <li><a class="btn btn-outline-primary mr-15 mb-5 active" href="#application" data-bs-toggle="tab"
                                               role="tab" aria-controls="application" aria-selected="true">Aplicación</a></li>
                                        <li><a class="btn btn-outline-primary mr-15 mb-5" href="#offer" data-bs-toggle="tab" role="tab"
                                               aria-controls="offer" aria-selected="true">Oferta</a></li>
                                        <li><a class="btn btn-outline-primary mr-15 mb-5" href="#candidate" data-bs-toggle="tab" role="tab"
                                               aria-controls="candidate" aria-selected="true">Candidato</a></li>
                                        <li><a class="btn btn-outline-primary mr-15 mb-5" href="#work-experience" data-bs-toggle="tab"
                                               role="tab" aria-controls="work-experience" aria-selected="false">Experiencia Laboral</a></li>
                                        <li><a class="btn btn-outline-primary mr-15 mb-5" href="#education-experience" data-bs-toggle="tab"
                                               role="tab" aria-controls="education-experience" aria-selected="false">Educación</a></li>
                                        <li><a class="btn btn-outline-primary mr-15 mb-5" href="#skills-languages" data-bs-toggle="tab"
                                               role="tab" aria-controls="skills-languages" aria-selected="false">Habilidades & Lenguajes</a>
                                        </li>
                                        <li><a class="btn btn-outline-primary mb-5" href="#tracing" data-bs-toggle="tab" role="tab"
                                               aria-controls="tracing" aria-selected="false">Seguimiento</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="application" role="tabpanel" aria-labelledby="application">
                                        <h6 class="color-text-paragraph-2 mb-30">Detalles de la aplicación ID {{ $application->id_formatted }}</h6>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Estado</label>
                                                    <input type="text" class="form-control fw-bold text-{{ $application->status->color }}" id="title" name="title" value="{{ $application->status->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Profesión</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $application->candidate->profession->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Años de Experiencia</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $application->candidate->experience->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Expectativa Salarial</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $application->expected_salary_formatted . ' Gs.' ?? 'Salario No Definido' }}"
                                                           disabled>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Mensaje Incluido</label>
                                                    <textarea name="about_me" id="about_me" cols="30" rows="5" class="form-control"
                                                              disabled>{{ $application->message ?? 'No se registró un mensaje'}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group mb-0">
                                                    <label class="font-sm color-text-mutted mb-10">Carta de Presentación</label>
                                                    <textarea name="about_me" id="about_me" cols="30" rows="10" class="form-control"
                                                              disabled>{{ $application->cover_letter ?? 'No se registró una carta de presentación'}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="offer" role="tabpanel" aria-labelledby="offer">
                                        <h6 class="color-text-paragraph-2 mb-30">Detalles de la oferta ID {{ $application->offer->id_formatted }}</h6>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Titulo</label>
                                                    <input type="text" class="form-control" id="title" name="title" value="{{ $application->offer->title }}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Ubicación</label>
                                                    <select name="city_id" id="city_id" class="form-control" disabled>
                                                        <option value="" selected disabled>Seleccione una ciudad</option>
                                                        @foreach($departments as $department)
                                                            <optgroup label="{{ $department->name }}">
                                                                @foreach($department->cities as $city)
                                                                    <option value="{{ $city->id }}"
                                                                            @if($city->id == $application->offer->city_id) selected @endif>
                                                                        {{ $city->name }}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Tipo de Trabajo</label>
                                                    <select name="job_type_id" id="job_type_id" class="form-control" disabled>
                                                        <option value="" selected disabled>Seleccione una ciudad</option>
                                                        @foreach($job_types as $job_type)
                                                            <option value="{{ $job_type->id }}"
                                                                    @if($job_type->id == $application->offer->job_type_id) selected @endif>
                                                                {{ $job_type->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Experiencia Requerida</label>
                                                    <select name="experience_id" id="experience_id" class="form-control" disabled>
                                                        <option value="" selected disabled>Seleccione una ciudad</option>
                                                        @foreach($experiences as $experience)
                                                            <option value="{{ $experience->id }}"
                                                                    @if($experience->id == $application->offer->experience_id) selected @endif>
                                                                {{ $experience->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Descripción</label>
                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="12"
                                                              disabled>{{ $application->offer->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Salario (opcional)</label>
                                                    <input type="text" class="form-control" id="salary" name="salary"
                                                           value="{{ $application->offer->salary_formatted }} Gs." disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Estado *</label>
                                                    <select name="is_active" id="is_active" class="form-control" disabled>
                                                        <option value="1" @if($application->offer->is_active == '1') selected @endif>Activo</option>
                                                        <option value="0" @if($application->offer->is_active == '0') selected @endif>Inactivo</option>
                                                    </select>
                                                    @error('is_active')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Categorías</label>
                                                    @foreach($categories as $category)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{ $category->id }}" disabled
                                                                   id="category-{{ $category->id }}" name="category_ids[]" @if(in_array($category->id, $application->offer->offerCategories->pluck('category_id')->toArray())) checked @endif>
                                                            <label class="form-check-label" for="category-{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="candidate" role="tabpanel" aria-labelledby="candidate">
                                        <h6 class="color-text-paragraph-2 mb-30">Detalles del candidato ID {{ $application->candidate->id_formatted }}</h6>
                                        <div class="box-profile-image">
                                            <div class="img-profile">
                                                <a href="{{ $application->candidate->user->photo_url }}" target="_blank">
                                                    <img src="{{ $application->candidate->user->photo_url }}" alt="jobBox"
                                                         id="photo-preview"
                                                         class="photo-placeholder">
                                                </a>
                                            </div>
                                            <div class="info-profile">
                                                @if($application->candidate->is_verified)
                                                    <button class="btn btn-success icon-tick me-3">Perfil Verificado</button>
                                                @else
                                                    <button class="btn btn-secondary me-3">Verificación Pendiente</button>
                                                @endif
                                                @if($application->candidate->resume)
                                                    <a class="btn btn-primary" href="{{ $application->candidate->resume_url }}"
                                                       target="_blank">
                                                        Descargar CV
                                                    </a>
                                                @else
                                                    <a class="btn btn-secondary" href="#"
                                                       onclick="swalFire('error', 'El candidato no subió su CV');">
                                                        No tiene CV
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Nombre(s)</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $application->candidate->user->name }}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Apellido(s)</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $application->candidate->user->last_name }}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Teléfono</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $application->candidate->telephone }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Correo Electrónico</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $application->candidate->email }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Ubicación</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $application->candidate->city->department->name }}, {{ $application->candidate->city->name }}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Dirección</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $application->candidate->address }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group mb-0">
                                                    <label class="font-sm color-text-mutted mb-10">Sobre el Candidato</label>
                                                    <textarea name="about_me" id="about_me" cols="30" rows="5" class="form-control"
                                                              disabled>{{ $application->candidate->about_me }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="work-experience" role="tabpanel" aria-labelledby="work-experience">
                                        <h6 class="color-text-paragraph-2 mb-30">Experiencia Laboral</h6>
                                        <div class="row">
                                            @if($application->candidate->workExperiences->count() > 0)
                                                <div class="col-lg-10">
                                                    <div class="box-timeline">
                                                        @foreach($application->candidate->workExperiences as $work_experience)
                                                            <div class="item-timeline">
                                                                <div class="timeline-year">
                                                        <span>
                                                            {{ \Carbon\Carbon::parse($work_experience->from)->format('Y') }} -
                                                            {{ \Carbon\Carbon::parse($work_experience->to)->format('Y') }}
                                                        </span>
                                                                </div>
                                                                <div class="timeline-info">
                                                                    <h6 class="color-brand-1">
                                                                        {{ $work_experience->company }} -
                                                                        <small class="color-text-paragraph-2">{{ $work_experience->occupation }}</small>
                                                                    </h6>
                                                                    <p class="color-text-paragraph-2 mb-15">
                                                                        {{ $work_experience->description }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <p class="color-text-mutted">No tiene experiencias laborales registradas</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="education-experience" role="tabpanel"
                                         aria-labelledby="education-experience">
                                        <h6 class="color-text-paragraph-2 mb-30">Educación</h6>
                                        <div class="row">
                                            @if($application->candidate->educationExperiences->count() > 0)
                                                <div class="col-lg-10">
                                                    <div class="box-timeline">
                                                        @foreach($application->candidate->educationExperiences as $education_experience)
                                                            <div class="item-timeline">
                                                                <div class="timeline-year">
                                                        <span>
                                                            {{ \Carbon\Carbon::parse($education_experience->from)->format('Y') }} -
                                                            {{ \Carbon\Carbon::parse($education_experience->to)->format('Y') }}
                                                        </span>
                                                                </div>
                                                                <div class="timeline-info">
                                                                    <h6 class="color-brand-1">
                                                                        {{ $education_experience->institution }} -
                                                                        <small class="color-text-paragraph-2">
                                                                            {{ $education_experience->title }}
                                                                        </small>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <p class="color-text-mutted">No tiene educaciones registradas</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="skills-languages" role="tabpanel" aria-labelledby="skills-languages">
                                        <h6 class="color-text-paragraph-2 mb-30">Habilidades</h6>
                                        <div class="row mb-30">
                                            <div class="col-lg-12">
                                                @if($application->candidate->candidateSkills->count() > 0)
                                                    <div class="">
                                                        @foreach($application->candidate->candidateSkills as $candidate_skill)
                                                            <a class="btn btn-tag tags-link">{{ $candidate_skill->skill->name }}</a>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p class="color-text-mutted">No tiene habilidades registradas</p>
                                                @endif
                                            </div>
                                        </div>
                                        <h6 class="color-text-paragraph-2 mb-30">Lenguajes</h6>
                                        <div class="col-lg-12">
                                            @if($application->candidate->candidateLanguages->count() > 0)
                                                <div class="">
                                                    @foreach($application->candidate->candidateLanguages as $candidate_language)
                                                        <a class="btn btn-tag tags-link">{{ $candidate_language->language->name }}</a>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p class="color-text-mutted">No tiene lenguajes registradas</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tracing" role="tabpanel" aria-labelledby="tracing">
                                        <form action="{{ route('backend.applications.store_observation', ['application' => $application->id]) }}" method="POST" autocomplete="off">
                                            @csrf
                                            <h6 class="color-text-paragraph-2 mb-30">Observaciones</h6>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @if($application->observations->count() > 0)
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover">
                                                                <tbody>
                                                                @foreach($application->observations->sortBy('created_at') as $observation)
                                                                    <tr>
                                                                        <td style="width: 200px;">{{ $observation->created_at_formatted }}</td>
                                                                        <td>{{ $observation->message }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <p class="color-text-mutted">No tiene observaciones registradas</p>
                                                    @endif

                                                    <div class="col-lg-12 mt-3">
                                                        <div class="form-group mb-30">
                                                            <input type="text" class="form-control" id="message" name="message"
                                                                   placeholder="Agregue una nueva observación" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mt-0 mb-0">
                                                            <button type="submit" class="btn btn-primary me-3">
                                                                Guardar Observación
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <form action="{{ route('backend.applications.store_status_history', ['application' => $application->id]) }}" method="POST" autocomplete="off">
                                            @csrf
                                            <h6 class="color-text-paragraph-2 mb-30 mt-30">Cambios de Estados</h6>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @if($application->statusHistories->count() > 0)
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover">
                                                                <tbody>
                                                                @foreach($application->statusHistories->sortBy('created_at') as $key => $status_history)
                                                                    <tr>
                                                                        <td style="width: 50px;"># {{ $key + 1 }}</td>
                                                                        <td style="width: 200px;">{{ $status_history->created_at_formatted }}</td>
                                                                        <td style="width: 200px;">
                                                                            <span class="badge badge-pill badge-{{ $status_history->status->color }}">
                                                                                {{ $status_history->status->name }}
                                                                            </span>
                                                                        </td>
                                                                        <td>{{ $status_history->message }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <p class="color-text-mutted">No tiene cambios de estados registradas</p>
                                                    @endif

                                                    <div class="col-lg-12 mt-3">
                                                        <div class="form-group mb-30">
                                                            <select name="status_id" id="status_id" class="form-control mb-30" required>
                                                                <option value="" selected disabled>Seleccione un estado</option>
                                                                @foreach($statuses as $status)
                                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-30">
                                                            <input type="text" class="form-control" id="message" name="message"
                                                                   placeholder="Agregue una nueva observación" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mt-0 mb-0">
                                                            <button type="submit" class="btn btn-primary me-3">
                                                                Guardar Observación
                                                            </button>
                                                        </div>
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
        </div>
    </div>
@endsection
