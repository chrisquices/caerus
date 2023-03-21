<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="{{ route('backend.dashboard.index') }}">
                        <img alt="jobBox" src="{{ asset('assets/backend/imgs/logo-big.png') }}" height="25">
                    </a>
                </div>
                <span class="btn btn-grey-small ml-10">Backend</span>
            </div>
            <div class="header-search">
                <div class="box-search">
                    <form action="">
                        <input class="form-control input-search" type="text" name="keyword" placeholder="Buscar...">
                    </form>
                </div>
            </div>
            <div class="header-right">
                <div class="block-signin">
                    @if(session('global_company_id'))
                        <a class="btn btn-default icon-edit hover-up me-3" href="{{ route('backend.offers.create') }}">Publicar Oferta</a>
                    @endif

                    <div class="member-login">
                        <img alt="" src="{{ auth()->user()->photo_url }}">
                        <div class="info-member">
                            <strong class="color-brand-1">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</strong>
                            <div class="dropdown">
                                <a class="font-xs color-text-paragraph-2 icon-down" id="dropdownProfile" type="button"
                                   data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                    {{ auth()->user()->email }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownProfile">
                                    <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="$('#form-logout').submit();">Cerrar Sesión</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span
            class="burger-icon-bottom"></span></div>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
                        <ul class="main-menu">
                            <li>
                                <a class="dashboard2 @if(Request::is('backend')) active @endif" href="{{ route('backend.dashboard.index') }}">
                                    <img src="{{ asset('assets/backend/imgs/page/dashboard/dashboard.svg') }}" alt="jobBox">
                                    <span class="name">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a class="dashboard2 @if(Request::is('backend/companies')) active @endif" href="{{ route('backend.companies.index') }}">
                                    <img src="{{ asset('assets/backend/imgs/page/dashboard/recruiters.svg') }}" alt="jobBox">
                                    <span class="name">Empresas</span>
                                </a>
                            </li>
                            <li>
                                <a class="dashboard2 @if(Request::is('backend/users')) active @endif" href="{{ route('backend.users.index') }}">
                                    <img src="{{ asset('assets/backend/imgs/page/dashboard/candidates.svg') }}" alt="jobBox">
                                    <span class="name">Usuarios</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Mi Cuenta</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="#">Mi Perfil</a></li>
                        <li><a href="#" onclick="$('#form-logout').submit();">Cerrar Sesión</a></li>
                    </ul>
                    <div class="mb-15 mt-15"><a class="btn btn-default icon-edit hover-up" href="#">Publicar Oferta</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('backend.logout') }}" method="POST" id="form-logout" onsubmit="return confirm('Confirmar cierre de sesión');">
    @csrf
</form>
