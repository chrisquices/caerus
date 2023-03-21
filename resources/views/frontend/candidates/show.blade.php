@extends('frontend.layouts.app')
@section('title', $candidate->user->name . ' ' . $candidate->user->last_name)
@section('content')
    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-image-single">
                @if($candidate->banner)
                    <img src="{{ $candidate->banner_url }}" alt="jobbox" height="350">
                @else
                    <img src="{{ asset('assets/frontend/imgs/banner-placeholder.jpg') }}" alt="jobbox" height="350">
                @endif
            </div>
            <div class="box-company-profile">
                <div class="image-compay">
                    <img src="{{ $candidate->user->photo_url }}" alt="jobbox">
                </div>
                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <h5 class="f-18">{{ $candidate->user->name }} {{ $candidate->user->last_name }}
                            <span class="card-location font-regular ml-20">
                                @if($candidate->city)
                                    {{ $candidate->city->department->name }},
                                    {{ $candidate->city->name }}
                                @else
                                    -
                                @endif
                            </span>
                        </h5>
                        <p class="mt-0 font-md color-text-paragraph-2 mb-15">
                            @if($candidate->profession)
                                {{ $candidate->profession->name }} ({{ $candidate->experience->name }})
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    @if($candidate->resume_url)
                        <div class="col-lg-4 col-md-12 text-lg-end">
                            <a class="btn btn-download-icon btn-apply btn-apply-big" href="#">Descargar CV</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="border-bottom pt-10 pb-10"></div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="content-single">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-short-bio" role="tabpanel" aria-labelledby="tab-short-bio">
                                <h4>Sobre Mí</h4>
                                <p>{!! $candidate->about_me !!}</p>
                                <br>
                                <h4>Experiencia Laboral</h4>
                                @if($candidate->workExperiences->count() > 0)
                                    <div class="box-list-jobs display-list">
                                        @foreach($candidate->workExperiences as $work_experience)
                                            <div class="col-xl-12 col-12">
                                                <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn">
                                                    <span class="flash"></span>
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-6 col-sm-12">
                                                            <div class="card-grid-2-image-left">
                                                                <div class="right-info">
                                                                    <a class="name-job" href="javascript:void(0);">
                                                                        {{ $work_experience->occupation }}
                                                                    </a>
                                                                    <span class="location-small">
                                                                        <span class="fw-bold">{{ $work_experience->company }}</span>,
                                                                        {{ $work_experience->location }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                            <div class="pl-15 mb-15 mt-30">
                                                                <a class="btn btn-grey-small mr-5" href="#">
                                                                    <span class="fw-bold me-1">
                                                                        {{ \Carbon\Carbon::parse($work_experience->from)->diffInYears($work_experience->to) }} años
                                                                    </span>
                                                                    ({{ \Carbon\Carbon::parse($work_experience->from)->format('M-Y') }}
                                                                    - {{ \Carbon\Carbon::parse($work_experience->to)->format('M-Y') }})
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-block-info">
                                                        <p class="font-sm color-text-paragraph mt-10 mb-0">
                                                            {{ $work_experience->description }}
                                                            <br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>No tiene experiencias laborales registradas</p>
                                @endif
                                <br>
                                <h4>Educación</h4>
                                @if($candidate->educationExperiences->count() > 0)
                                    <div class="box-list-jobs display-list">
                                        @foreach($candidate->educationExperiences as $education_experience)
                                            <div class="col-xl-12 col-12">
                                                <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn">
                                                    <span class="flash"></span>
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-6 col-sm-12">
                                                            <div class="card-grid-2-image-left">
                                                                <div class="right-info">
                                                                    <a class="name-job" href="javascript:void(0);">
                                                                        {{ $education_experience->title }}
                                                                    </a>
                                                                    <span class="location-small">
                                                                        <span class="fw-bold">{{ $education_experience->institution }}</span>,
                                                                        {{ $education_experience->location }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                            <div class="pl-15 mb-15 mt-30">
                                                                <a class="btn btn-grey-small mr-5" href="#">
                                                                    <span class="fw-bold me-1">
                                                                        {{ \Carbon\Carbon::parse($education_experience->from)->diffInYears($education_experience->to) }} años
                                                                    </span>
                                                                    ({{ \Carbon\Carbon::parse($education_experience->from)->format('M-Y') }}
                                                                    - {{ \Carbon\Carbon::parse($education_experience->to)->format('M-Y') }})
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>No tiene educaciones registradas</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <h5 class="f-18">Información Personal & Profesional</h5>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item">
                                        <i class="fi-rr-briefcase"></i>
                                    </div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description width-100p">Profesión</span>
                                        <strong class="small-heading">{{ $candidate->profession->name }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item">
                                        <i class="fi-rr-briefcase"></i>
                                    </div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description width-100p">Experiencia</span>
                                        <strong class="small-heading">{{ $candidate->experience->name }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item">
                                        <i class="fi-rr-dollar"></i>
                                    </div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description width-100p">Expectativa Salarial</span>
                                        @if($candidate->expected_salary)
                                            <strong class="small-heading">{{ $candidate->expected_salary }}</strong>
                                        @else
                                            <strong class="small-heading">Salario No Definido</strong>
                                        @endif
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item">
                                        <i class="fi-rr-time-fast"></i>
                                    </div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description width-100p">Habilidades</span>
                                        @if($candidate->candidateSkills->count() > 0)
                                            <strong class="small-heading">
                                                @foreach($candidate->candidateSkills as $candidate_skill)
                                                    {{ $candidate_skill->skill->name }} {{ (!$loop->last) ? ',' : '' }}
                                                @endforeach
                                            </strong>
                                        @else
                                        @endif
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item">
                                        <i class="fi-rr-marker"></i>
                                    </div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Lenguajes</span>
                                        @if($candidate->candidateLanguages->count() > 0)
                                            <strong class="small-heading">
                                                @foreach($candidate->candidateLanguages as $candidate_language)
                                                    {{ $candidate_language->language->name }} {{ (!$loop->last) ? ',' : '' }}
                                                @endforeach
                                            </strong>
                                        @else
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                                <li><span class="fw-bold">Ubicación:</span> {{ $candidate->city->department->name }}
                                    , {{ $candidate->city->name }}</li>
                                <li><span class="fw-bold">Dirección:</span> {{ $candidate->address }}</li>
                                <li><span class="fw-bold">Teléfono:</span> {{ $candidate->telephone }}</li>
                                <li><span class="fw-bold">Email:</span> {{ $candidate->user->email }}</li>
                            </ul>
                            {{--                            <div class="mt-30"><a class="btn btn-send-message" href="page-contact.html">Send Message</a></div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
