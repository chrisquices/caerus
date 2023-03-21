<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="{{ route('frontend.home.index') }}">
                        <img alt="jobBox" src="{{ asset('assets/frontend/imgs/logo-big.png') }}" style="max-height: 50px;">
                    </a>
                </div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li><a class="@if(request()->is('') || request()->is('/')) active @endif" href="{{ route('frontend.home.index') }}">Inicio</a></li>
                        <li><a class="@if(request()->is('offers') || request()->is('offers/*')) active @endif" href="{{ route('frontend.offers.index') }}">Buscar Ofertas</a></li>
                        <li><a class="@if(request()->is('quick-offers') || request()->is('quick-offers/*')) active @endif" href="{{ route('frontend.quick_offers.index') }}">Ofertas Rápidas</a></li>
                        <li><a class="@if(request()->is('candidates') || request()->is('candidates/*')) active @endif" href="{{ route('frontend.candidates.index') }}">Candidatos</a></li>
                        <li class="dashboard" style="padding-top: 5px;"><a class="text-primary fw-bold" href="{{ route('backend.login') }}">Acceso Backend</a></li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span
                            class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
                @if(auth()->user())
                    <div class="block-signin">
                        <a class="text-link-bd-btom hover-up" href="{{ route('frontend.profile.index') }}">Mi Cuenta</a>
                        <form action="{{ route('frontend.logout') }}" method="POST" class="d-inline" id="form-logout">
                            @csrf
                            <button type="submit" class="btn btn-default btn-shadow ml-40 hover-up">Cerrar Sesión</button>
                        </form>
                    </div>
                @else
                    <div class="block-signin">
                        <a class="text-link-bd-btom hover-up" href="{{ route('frontend.register') }}">Registrarme</a>
                        <a class="btn btn-default btn-shadow ml-40 hover-up" href="{{ route('frontend.login') }}">Iniciar Sesión</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li><a class="@if(request()->is('') || request()->is('/')) active @endif" href="{{ route('frontend.home.index') }}">Inicio</a></li>
                            <li><a class="@if(request()->is('offers') || request()->is('offers/*')) active @endif" href="{{ route('frontend.offers.index') }}">Buscar Ofertas</a></li>
                            <li><a class="@if(request()->is('quick-offers') || request()->is('quick-offers/*')) active @endif" href="{{ route('frontend.quick_offers.index') }}">Ofertas Rápidas</a></li>
                            <li><a class="@if(request()->is('candidates') || request()->is('candidates/*')) active @endif" href="{{ route('frontend.candidates.index') }}">Candidatos</a></li>
                            <li class="dashboard" style="padding-top: 5px;"><a class="text-primary fw-bold" href="{{ route('backend.login') }}">Acceso Backend</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <ul class="mobile-menu font-heading">
                        @if(auth()->user())
                            <li><a href="{{ route('frontend.profile.index') }}">Mi Cuenta</a></li>
                            <li><a href="javascript:void(0);" onclick="$('#form-logout').submit();">Cerrar Sesión</a></li>
                        @else
                            <li><a href="{{ route('frontend.register') }}">Registrarme</a></li>
                            <li><a href="{{ route('frontend.login') }}">Iniciar Sesión</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

