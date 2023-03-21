@extends('backend.layouts.app')
@section('title', 'Ofertas Rápidas')
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
                        <li><span>Ver Oferta Rápida</span></li>
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
                                <h6 class="color-text-paragraph-2 mb-30">Detalles de la oferta rápida ID {{ $quick_offer->id_formatted }}</h6>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Foto</label>
                                            <a href="{{ $quick_offer->photo_url }}" target="_blank">
                                                <img src="{{ $quick_offer->photo_url }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mt-0 mb-0">
                                            <form action="{{ route('backend.quick_offers.delete', ['quick_offer' => $quick_offer->id]) }}" method="POST"
                                                  class="d-inline" onsubmit="return confirm('Confirmar');">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="btn btn-danger me-3" onclick="$(this).parent().submit();">
                                                    Eliminar
                                                </a>
                                            </form>
                                            <a href="{{ route('backend.quick_offers.index') }}" class="btn btn-outline-primary me-3">
                                                Cancelar
                                            </a>
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
