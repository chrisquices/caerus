@extends('backend.layouts.app')
@section('title', 'Candidatos')
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
                        <li><a class="sub-breadcrumb" href="{{ route('backend.candidates.index') }}">@yield('title')</a></li>
                        <li><span>Ver Candidato</span></li>
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
                                        <li><a class="btn btn-outline-primary mr-15 mb-5 active" href="#candidate" data-bs-toggle="tab"
                                               role="tab" aria-controls="candidate" aria-selected="true">Candidato</a></li>
                                        <li><a class="btn btn-outline-primary mr-15 mb-5" href="#work-experience" data-bs-toggle="tab"
                                               role="tab" aria-controls="work-experience" aria-selected="false">Experiencia Laboral</a></li>
                                        <li><a class="btn btn-outline-primary mr-15 mb-5" href="#education-experience" data-bs-toggle="tab"
                                               role="tab" aria-controls="education-experience" aria-selected="false">Educación</a></li>
                                        <li><a class="btn btn-outline-primary mr-15 mb-5" href="#skills-languages" data-bs-toggle="tab"
                                               role="tab" aria-controls="skills-languages" aria-selected="false">Habilidades & Lenguajes</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="candidate" role="tabpanel" aria-labelledby="candidate">
                                        <h6 class="color-text-paragraph-2 mb-30">Detalles del candidato ID {{ $candidate->id_formatted }}</h6>
                                        <div class="box-profile-image">
                                            <div class="img-profile">
                                                <a href="{{ $candidate->user->photo_url }}" target="_blank">
                                                    <img src="{{ $candidate->user->photo_url }}" alt="jobBox"
                                                         id="photo-preview"
                                                         class="photo-placeholder">
                                                </a>
                                            </div>
                                            <div class="info-profile">
                                                @if($candidate->is_verified)
                                                    <button class="btn btn-success icon-tick me-3">Perfil Verificado</button>
                                                @else
                                                    <button class="btn btn-secondary me-3">Verificación Pendiente</button>
                                                @endif
                                                @if($candidate->resume)
                                                    <a class="btn btn-primary" href="{{ $candidate->resume_url }}"
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
                                                           value="{{ $candidate->user->name }}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Apellido(s)</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $candidate->user->last_name }}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Teléfono</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $candidate->telephone }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Correo Electrónico</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $candidate->email }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Ubicación</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $candidate->city->department->name }}, {{ $candidate->city->name }}"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <label class="font-sm color-text-mutted mb-10">Dirección</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $candidate->address }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group mb-0">
                                                    <label class="font-sm color-text-mutted mb-10">Sobre el Candidato</label>
                                                    <textarea name="about_me" id="about_me" cols="30" rows="5" class="form-control"
                                                              disabled>{{ $candidate->about_me }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="work-experience" role="tabpanel" aria-labelledby="work-experience">
                                        <h6 class="color-text-paragraph-2 mb-30">Experiencia Laboral</h6>
                                        <div class="row">
                                            @if($candidate->workExperiences->count() > 0)
                                                <div class="col-lg-10">
                                                    <div class="box-timeline">
                                                        @foreach($candidate->workExperiences as $work_experience)
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
                                            @if($candidate->educationExperiences->count() > 0)
                                                <div class="col-lg-10">
                                                    <div class="box-timeline">
                                                        @foreach($candidate->educationExperiences as $education_experience)
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
                                                @if($candidate->candidateSkills->count() > 0)
                                                    <div class="">
                                                        @foreach($candidate->candidateSkills as $candidate_skill)
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
                                            @if($candidate->candidateLanguages->count() > 0)
                                                <div class="">
                                                    @foreach($candidate->candidateLanguages as $candidate_language)
                                                        <a class="btn btn-tag tags-link">{{ $candidate_language->language->name }}</a>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p class="color-text-mutted">No tiene lenguajes registradas</p>
                                            @endif
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
