@extends('frontend.layouts.app')
@section('title', 'Ofertas Rápidas')
@section('content')
    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-single banner-single-bg">
                <div class="block-banner text-center">
                    <h3 class="wow animate__ animate__fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <span class="color-brand-2">{{ $quick_offers_today}} Nuevas</span> Ofertas Hoy
                    </h3>
                    <div class="font-sm color-text-paragraph-2 mt-10 wow animate__ animate__fadeInUp animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        Actualizamos diariamente éstas ofertas en forma de anuncios,
                        <br class="d-none d-xl-block">
                        conéctate diariamente para ver las ofertas más recientes
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-30">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
                    <div class="content-page">
                        <div class="box-filters-job">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5">
                            <span class="text-small text-showing">
                                Mostrando las <strong class="text-primary">{{ $quick_offers->count() }}</strong> ofertas más recientes,
                                actualizado <strong class="text-primary">hoy ({{ date('d-m-Y') }})</strong>
                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($quick_offers as $quick_offer)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 hover-up">
                                        <a href="{{ $quick_offer->photo_url }}" target="_blank">
                                            <img src="{{ $quick_offer->photo_url }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
