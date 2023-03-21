@extends('frontend.layouts.app')
@section('title', $offer->title)
@section('content')
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="box-border-single">
                        <div class="row mt-10">
                            <div class="col-lg-8 col-md-12">
                                <h3>{{ $offer->title }}</h3>
                                <div class="mt-0 mb-15">
                                    <span class="card-briefcase">{{ $offer->jobType->name }}</span>
                                    <span class="card-time">{{ $offer->posted_at_time_ago }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 text-lg-end">
                                @if(auth()->user())
                                    @if($can_apply)
                                        <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up mb-20" data-bs-toggle="modal"
                                             data-bs-target="#ModalApplyJobForm">Aplicar Ahora
                                        </div>
                                    @else
                                        <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up mb-20 bg-secondary">
                                            Ya enviaste tu aplicación
                                        </div>
                                    @endif
                                @else
                                    <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up mb-20" onclick="window.location.href = '{{ route('frontend.login', ['offer' => $offer->id]) }}';">
                                        Inicia Sesión
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="job-overview">
                            <h5 class="border-bottom pb-15 mb-30">Resumen de la Oferta</h5>

                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item">
                                        <img src="{{ asset('assets/frontend/imgs/page/job-single/job-type.svg') }}" alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10">
                                        <span class="text-description salary-icon mb-10">Tipo</span>
                                        <strong class="small-heading">{{ $offer->jobType->name }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item">
                                        <img src="{{ asset('assets/frontend/imgs/page/job-single/experience.svg') }}" alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10">
                                        <span class="text-description salary-icon mb-10">Experiencia</span>
                                        <strong class="small-heading">{{ $offer->experience->name }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item">
                                        <img src="{{ asset('assets/frontend/imgs/page/job-single/salary.svg') }}" alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10">
                                        <span class="text-description salary-icon mb-10">Salario</span>
                                        @if($offer->salary)
                                            <strong class="small-heading">{{ $offer->salary_formatted }}</strong>
                                        @else
                                            <strong class="small-heading">Salario No Definido</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item">
                                        <img src="{{ asset('assets/frontend/imgs/page/job-single/updated.svg') }}" alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10">
                                        <span class="text-description salary-icon mb-10">Publicado</span>
                                        <strong class="small-heading">{{ $offer->posted_at_time_ago }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-12 d-flex">
                                    <div class="sidebar-icon-item">
                                        <img src="{{ asset('assets/frontend/imgs/page/job-single/industry.svg') }}" alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10">
                                        <span class="text-description industry-icon ">Categorías</span>
                                        <strong class="small-heading">
                                            @foreach($offer->offerCategories as $offer_category)
                                                {{ $offer_category->category->name . ((!$loop->last) ? ',' : '') }}
                                            @endforeach
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-single">{!! $offer->description !!}</div>

                        <div class="author-single mt-4">
                            <span>{{ $offer->company->name }}</span>
                        </div>

                        @if(auth()->user())
                            @if($can_apply)
                                <div class="single-apply-jobs">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <a class="btn btn-default mr-15" href="#">Aplicar Ahora</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="single-apply-jobs">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <a class="btn btn-secondary mr-15" href="#">Ya enviaste tu aplicación</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="single-apply-jobs">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <a class="btn btn-default mr-15" href="{{ route('frontend.login', ['offer' => $offer->id]) }}">Inicia sesión para enviar tu aplicación</a>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <figure>
                                    <img alt="jobBox" src="{{ $offer->company->photo_url }}">
                                </figure>
                                <div class="sidebar-info">
                                    <span class="sidebar-company">{{ $offer->company->name }}</span>
                                    <span class="card-location">
                                        {{ $offer->city->department->name }}
                                        {{ $offer->city->name }}
                                    </span>
{{--                                    <a class="link-underline mt-15" href="#">Ver más de esta empresa</a>--}}
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                                <li><span class="fw-bold">Categoría:</span> {{ $offer->company->category->name }}</li>
                                <li><span class="fw-bold">Dirección:</span> {{ $offer->company->address }}</li>
                                <li><span class="fw-bold">Teléfono:</span> {{ $offer->company->telephone }}</li>
                                <li><span class="fw-bold">Email:</span> {{ $offer->company->email }}</li>
                                <li><span class="fw-bold">Sitio Web:</span>
                                    <a href="{{ $offer->company->website }}">{{ $offer->company->website }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-border">
                        <h6 class="f-18">Ofertas Similares</h6>
                        <div class="sidebar-list-job">
                            <ul>
                                @foreach($similar_offers as $similar_offer)
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up cursor-pointer">
                                            <div class="image similar-job-img">
                                                <a href="{{ route('frontend.offers.show', ['offer' => $similar_offer->id]) }}">
                                                    <img src="{{ $similar_offer->company->photo_url }}" alt="jobBox"></a>
                                            </div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1">
                                                    <a href="{{ route('frontend.offers.show', ['offer' => $similar_offer->id]) }}">
                                                        {{ $similar_offer->title }}
                                                    </a>
                                                </h5>
                                                <div class="mt-5">
                                                    <span class="card-briefcase">{{ $similar_offer->jobType->name }}</span>
                                                    <span class="card-time"><span>{{ $similar_offer->experience->name }}</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    @if($similar_offer->salary)
                                                        <span class="card-briefcase">{{ $similar_offer->salary_formatted }}</span>
                                                    @else
                                                        <span class="card-briefcase">Salario No Definido</span>
                                                    @endif
                                                    <span class="card-time"><span>{{ $similar_offer->posted_at_time_ago }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-50 mb-20">
        <div class="container">
            <div class="box-newsletter">
                <div class="row">
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block">
                    </div>
                    <div class="col-lg-12 col-xl-6 col-12">
                        <h2 class="text-md-newsletter text-center">
                            Siempre habrá ofertas nuevas
                            <br>
                            Suscribete para enterarte de ellas!
                        </h2>
                        <div class="box-form-newsletter mt-40">
                            <form class="form-newsletter">
                                <input class="input-newsletter" type="text" value="" placeholder="Ingrese aquí su correo">
                                <button type="button" class="btn btn-default font-heading icon-send-letter" onclick="swalFire('success', 'Te has suscrito al boletín exitosamente')">Suscribirme</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(auth()->user())
        @if(auth()->user()->candidate->is_verified && auth()->user()->candidate->is_active)
            <div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content apply-job-form">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body pl-30 pr-30 pt-50">
                            <div class="text-center">
                                <p class="font-sm text-brand-2">Aplicación de Empleo</p>
                                <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">{{ $offer->title }}</h2>
                                <p class="font-sm text-muted mb-30">Por favor complete su información y envíela a {{ $offer->company->name }}.</p>
                            </div>
                            <form class="login-register text-start mt-20 pb-30" action="{{ route('frontend.offers.store_application', ['offer' => $offer->id]) }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label" for="expected_salary">Expectativa Salarial (opcional)</label>
                                    <input class="form-control" id="expected_salary" type="number" name="expected_salary" placeholder="3.000.000" value="{{ auth()->user()->candidate->expected_salary ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="message">Mensaje de Introducción (opcional)</label>
                                    <textarea name="message" id="message" cols="30" rows="20" class="form-control" style="height: 120px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="cover_letter">Carta de Presentación (opcional)</label>
                                    <textarea name="cover_letter" id="cover_letter" cols="30" rows="20" class="form-control" style="height: 120px;"></textarea>
                                </div>
                                <div class="login_footer form-group d-flex justify-content-between">
                                    <span class="text-small">Al aplicar, se enviarán todos los datos de tu perfil, incluyendo tu CV.</span>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-default hover-up w-100" type="submit" name="login">Enviar Aplicación</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content apply-job-form">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body pl-30 pr-30 pt-50">
                            <div class="text-center">
                                <p class="font-sm text-brand-2">Aplicación de Empleo</p>
                                <h2 class="mt-10 mb-5 text-brand-1 text-capitalize mt-30">¡Espera!</h2>
                                <p class="font-sm text-muted mb-30 mt-30">Para continuar con su aplicación, debe completar su perfil.</p>
                                <p class="font-sm text-muted mb-30">
                                    Para completar su perfil, ingrese a "Mi Cuenta" o
                                    <a href="{{ route('frontend.profile.index') }}"  target="_blank" class="text-primary fw-bold">presione aquí.</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection
