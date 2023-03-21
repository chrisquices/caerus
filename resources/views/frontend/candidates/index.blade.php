@extends('frontend.layouts.app')
@section('title', 'Candidatos')
@section('content')
    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-single banner-single-bg">
                <div class="block-banner text-center">
                    <h3 class="wow animate__ animate__fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <span class="color-brand-2">{{ $candidates_count }} Candidatos</span> Disponibles
                    </h3>
                    <div class="font-sm color-text-paragraph-2 mt-10 wow animate__ animate__fadeInUp animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        Busca y encuentra al candidato ideal para formar parte de tu empresa
                        <br class="d-none d-xl-block">Contacta con ellos directamente, sin necesidad de pasos
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-30">

        <livewire:frontend.candidates-index/>

    </section>
@endsection
