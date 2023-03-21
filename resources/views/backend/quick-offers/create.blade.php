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
                        <li><a class="sub-breadcrumb" href="{{ route('backend.offers.index') }}">@yield('title')</a></li>
                        <li><span>Nueva Oferta Rápida</span></li>
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
                                <h6 class="color-text-paragraph-2 mb-30">Complete el formulario para crear una nueva oferta rápida</h6>
                                <form action="{{ route('backend.quick_offers.store') }}" method="POST" enctype="multipart/form-data"
                                      autocomplete="off">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Imágenes (Máximo 10)</label>
                                                <input type="file" class="form-control" id="photos" name="photos[]" accept=".jpg, .jpeg"
                                                       multiple required>
                                                @error('photos')<span class="validation-text text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mt-0 mb-0">
                                                <button type="submit" class="btn btn-primary me-3">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('backend.quick_offers.index') }}" class="btn btn-outline-primary me-3">
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
