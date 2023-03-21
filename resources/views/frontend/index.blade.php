@extends('frontend.layouts.app')
@section('title', 'Inicio')
@section('content')
    <div class="bg-homepage1"></div>

    <section class="section-box">
        <div class="banner-hero hero-1">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <div class="block-banner">
                            <h1 class="heading-banner wow animate__animated animate__fadeInUp">
                                La <span class="color-brand-2">Mejor Manera</span><br class="d-none d-lg-block">para conseguir to Nuevo
                                Empleo
                            </h1>

                            <div class="banner-description mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                Cada mes, más de 3 millones de personas que buscan
                                <br class="d-none d-lg-block">
                                trabajo recurren a sitio web en su búsqueda de trabajo,
                                <br class="d-none d-lg-block">
                                generando más de 140.000 aplicaciones todos los días
                            </div>

                            <div class="form-find mt-40 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                                <form action="{{ route('frontend.offers.index') }}" autocomplete="off">
                                    <div class="box-industry">
                                        <select class="form-input mr-10 select-active input-industry" name="category_id">
                                            <option value="" selected disabled>Categoría</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <select class="form-input mr-10 select-active" name="city_id">
                                        <option value="" selected disabled>Ubicación</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    <input class="form-input input-keysearch mr-10" type="text" name="search_term" placeholder="Buscar Oferta...">
                                    <button type="submit" class="btn btn-default btn-find font-sm">Buscar</button>
                                </form>
                            </div>
                            {{--                            <div class="list-tags-banner mt-60 wow animate__animated animate__fadeInUp" data-wow-delay=".3s"><strong>Popular--}}
                            {{--                                    Searches:</strong><a href="#">Designer</a>, <a href="#">Web</a>, <a href="#">IOS</a>, <a--}}
                            {{--                                        href="#">Developer</a>, <a href="#">PHP</a>, <a href="#">Senior</a>, <a href="#">Engineer</a></div>--}}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 d-none d-xl-block col-md-6">
                        <div class="banner-imgs">
                            <div class="block-1 shape-1">
                                <img class="img-responsive" alt="jobBox"
                                     src="{{ asset('assets/frontend/imgs/page/homepage1/banner1.png') }}">
                            </div>
                            <div class="block-2 shape-2">
                                <img class="img-responsive" alt="jobBox"
                                     src="{{ asset('assets/frontend/imgs/page/homepage1/banner2.png') }}">
                            </div>
                            <div class="block-3 shape-3">
                                <img class="img-responsive" alt="jobBox"
                                     src="{{ asset('assets/frontend/imgs/page/homepage1/icon-top-banner.png') }}">
                            </div>
                            <div class="block-4 shape-3">
                                <img class="img-responsive" alt="jobBox"
                                     src="{{ asset('assets/frontend/imgs/page/homepage1/icon-bottom-banner.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-100"></div>

    <section class="section-box mt-80">
        <div class="section-box wow animate__animated animate__fadeIn">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Explorar por Categoría</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">
                        Encuentre el trabajo perfecto para ti. Alrededor de 500+ nuevas ofertas todos los días
                    </p>
                </div>
                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-5 swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            @foreach($categories_chunks as $key => $category_chunk)
                                <div class="swiper-slide hover-up">
                                    @foreach($category_chunk as $key => $category)
                                        <a href="{{ route('frontend.offers.index', ['category_id' => $category->id]) }}">
                                            <div class="item-logo">
                                                <div class="image-left">
                                                    <img alt="jobBox" src="{{ $category->photo_url }}">
                                                </div>
                                                <div class="text-info-right">
                                                    <h4>{{ $category->name }}</h4>
                                                    <p class="font-xs">{{ $category->offerCategories->count() }}
                                                        <span> Ofertas Disponibles</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title mb-10 wow animate__ animate__fadeInUp animated"
                    style="visibility: visible; animation-name: fadeInUp;">Ofertas del Día</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__ animate__fadeInUp animated"
                   style="visibility: visible; animation-name: fadeInUp;">
                    Busque y conéctese con las mejores oportunidades del Paraguay.
                </p>
            </div>
            <div class="mt-50">
                <div class="row">
                    @foreach($latest_offers as $latest_offer)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12"
                             onclick="window.location.href = '{{ route('frontend.offers.show', ['offer' => $latest_offer->id]) }}'">
                            <div class="card-grid-2 hover-up cursor-pointer">
                                <div class="card-grid-2-image-left">
                                    <span class="flash"></span>
                                    <div class="image-box">
                                        <img src="{{ $latest_offer->company->photo_url }}" alt="jobBox">
                                    </div>
                                    <div class="right-info">
                                        <a class="name-job" href="#">{{ $latest_offer->company->name }}</a>
                                        <span class="location-small">
                                            {{ $latest_offer->city->department->name }},
                                            {{ $latest_offer->city->name }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-block-info">
                                    <h6>
                                        <a href="{{ route('frontend.offers.show', ['offer' => $latest_offer->id]) }}">{{ $latest_offer->title }}</a>
                                    </h6>
                                    <div class="mt-5">
                                        <span class="card-briefcase">{{ $latest_offer->jobType->name }}</span>
                                        <span class="card-time">{{ $latest_offer->experience->name }}</span>
                                    </div>
                                    <div class="mt-5">
                                        <span class="card-briefcase">
                                            @if($latest_offer->salary)
                                                {{ $latest_offer->salary_formatted }}
                                            @else
                                                Salario No Definido
                                            @endif
                                        </span>
                                        <span class="card-time">
                                            {{ $latest_offer->posted_at_time_ago }}
                                        </span>
                                    </div>
                                    <div class="card-2-bottom mt-30">
                                        <div class="row">
                                            <div class="col-lg-12 text-end">
                                                <div class="btn btn-apply-now">
                                                    <a href="#" class="text-primary text-apply-now" style="font-weight: 500;">
                                                        Ver Oferta
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-50 mb-20">
        <div class="box-newsletter box-newsletter-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-12 text-center d-none d-xl-block">
                        <img src="{{ asset('assets/frontend/imgs/page/homepage4/img-newsletter.png') }}" alt="joxBox">
                    </div>
                    <div class="col-xl-8 col-lg-12 col-12 text-center">
                        <div class="d-inline-block text-start">
                            <h2 class="color-white">Subscribete al boletín de novedades</h2>
                            <p class="mt-10 font-lg color-white">¡Recibirás en tu correo las últimas ofertas laborales!</p>
                            <div class="box-form-newsletter mt-40">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value="" placeholder="Ingrese aquí su correo">
                                    <button type="button" class="btn btn-default font-heading icon-send-letter"
                                            onclick="swalFire('success', 'Te has suscrito al boletín exitosamente')">Suscribirme
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
