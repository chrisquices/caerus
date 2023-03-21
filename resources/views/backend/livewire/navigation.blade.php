<div class="nav" wire:poll.5000ms>
    <a class="btn btn-expanded"></a>

    <nav class="nav-main-menu">
        @if(auth()->user()->type == 'Administrator' && session('global_company_id'))
            <div class="card-grid-2 hover-up">
                <div class="card-grid-2-image-left">
                    <div class="image-box">
                        <img src="{{ \App\Models\Company::find(session('global_company_id'))->photo_url }}" alt="jobBox">
                    </div>
                    <div class="right-info">
                        <a class="name-job" href="#"
                           style="font-size: 15px !important;">
                            {{ \App\Models\Company::find(session('global_company_id'))->name }}
                        </a>
                        <span class="location-small ">
                            <a href="{{ route('backend.stop_impersonation') }}" class="text-danger fw-bold">
                                Detener Imitación
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        @endif
        @if(auth()->user()->company)
                <div class="card-grid-2 hover-up">
                    <div class="card-grid-2-image-left">
                        <div class="image-box">
                            <img src="{{ \App\Models\Company::find(session('global_company_id'))->photo_url }}" alt="jobBox">
                        </div>
                        <div class="right-info">
                            <a class="name-job" href="#"
                               style="font-size: 15px !important;">
                                {{ \App\Models\Company::find(session('global_company_id'))->name }}
                            </a>
                            <span class="location-small ">
                                <a href="#" class="text-primary fw-bold">
                                {{ \App\Models\Company::find(session('global_company_id'))->city->name }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
        @endif
        <ul class="main-menu">
            <li>
                <a class="dashboard2 @if(Request::is('backend')) active @endif" href="{{ route('backend.dashboard.index') }}">
                    <img src="{{ asset('assets/backend/imgs/page/dashboard/dashboard.svg') }}" alt="jobBox">
                    <span class="name">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="dashboard2 @if(Request::is('backend/candidates')) active @endif" href="{{ route('backend.candidates.index') }}">
                    <img src="{{ asset('assets/backend/imgs/page/dashboard/candidates.svg') }}" alt="jobBox">
                    <span class="name">Candidatos</span>
                </a>
            </li>

            @if(session('global_company_id'))
                <li>
                    <a class="dashboard2 @if(Request::is('backend/offers')) active @endif" href="{{ route('backend.offers.index') }}">
                        <img src="{{ asset('assets/backend/imgs/page/dashboard/tasks.svg') }}" alt="jobBox">
                        <span class="name">Ofertas</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->type == 'Administrator')
                <li>
                    <a class="dashboard2 @if(Request::is('backend/quick-offers')) active @endif" href="{{ route('backend.quick_offers.index') }}">
                        <img src="{{ asset('assets/backend/imgs/page/dashboard/tasks.svg') }}" alt="jobBox">
                        <span class="name">Ofertas Rápidas</span>
                    </a>
                </li>
            @endif

            @if(session('global_company_id'))
                <li>
                    <a class="dashboard2 @if(Request::is('backend/applications')) active @endif"
                       href="{{ route('backend.applications.index') }}">
                        <img src="{{ asset('assets/backend/imgs/page/dashboard/tasks.svg') }}" alt="jobBox">
                        <span class="name">Aplicaciones</span>
                        <span class="name text-primary fw-bold @if(Request::is('backend/applications')) text-white @endif">({{ $pending_applications }})</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->type == 'Administrator')
                <li>
                    <a class="dashboard2 @if(Request::is('backend/companies')) active @endif" href="{{ route('backend.companies.index') }}">
                        <img src="{{ asset('assets/backend/imgs/page/dashboard/recruiters.svg') }}" alt="jobBox">
                        <span class="name">Empresas</span>
                    </a>
                </li>
            @endif

            <li>
                <a class="dashboard2 @if(Request::is('backend/users')) active @endif" href="{{ route('backend.users.index') }}">
                    <img src="{{ asset('assets/backend/imgs/page/dashboard/candidates.svg') }}" alt="jobBox">
                    <span class="name">Usuarios</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
