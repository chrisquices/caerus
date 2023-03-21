<div class="row">
    <div class="col-lg-12">
        <div class="section-box">
            <div class="container">
                <div class="panel-white mb-30">
                    <div class="box-padding">
                        <div class="box-filters-job @if($view_type == 'list') mb-0 @endif">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5"><span class="font-sm text-showing color-text-paragraph">
                                        @if($companies->total() > 0)
                                            Mostrando
                                            {{ $companies->count() * ($companies->currentPage() - 1) + 1 }}-{{ $companies->count() }}
                                            de {{ $companies->total() }} empresas
                                        @else
                                            Mostrando
                                            0-0
                                            de {{ $companies->total() }} empresas
                                        @endif

                                    </span>
                                </div>
                                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                    <div class="display-flex2">
                                        <div class="box-border me-2 hide-on-mobile">
                                            <span class="text-sortby">Buscar :</span>
                                            <div class="dropdown dropdown-sort custom-search-container">
                                                <input type="text" class="custom-search" value="" wire:model.debounce.500ms="search_term" wire:keydown.debounce.500ms="resetPage">
                                            </div>
                                        </div>
                                        <div class="box-border">
                                            <span class="text-sortby">Mostrar :</span>
                                            <div class="dropdown dropdown-sort">
                                                <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                                    <span>{{ $show }}</span>
                                                    <i class="fi-rr-angle-small-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                                                    <li><a class="dropdown-item @if($show = 12) active @endif" href="#"
                                                           wire:click="changeShow(12)">12</a></li>
                                                    <li><a class="dropdown-item @if($show = 24) active @endif" href="#"
                                                           wire:click="changeShow(24)">24</a></li>
                                                    <li><a class="dropdown-item @if($show = 36) active @endif" href="#"
                                                           wire:click="changeShow(36)">36</a></li>
                                                    <li><a class="dropdown-item @if($show = 48) active @endif" href="#"
                                                           wire:click="changeShow(48)">48</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="box-view-type">
                                            @if($view_type == 'grid')
                                                <a class="view-type" href="javascript:void(0);" wire:click="changeViewType('list')">
                                                    <img src="{{ asset('assets/backend/imgs/template/icons/icon-list.svg') }}" alt="jobBox">
                                                </a>
                                                <a class="view-type" href="javascript:void(0);" wire:click="changeViewType('grid')">
                                                    <img src="{{ asset('assets/backend/imgs/template/icons/icon-grid-selected.svg') }}"
                                                         alt="jobBox">
                                                </a>
                                            @endif
                                            @if($view_type == 'list')
                                                <a class="view-type" href="javascript:void(0);" wire:click="changeViewType('list')">
                                                    <img src="{{ asset('assets/backend/imgs/template/icons/icon-list-selected.svg') }}"
                                                         alt="jobBox">
                                                </a>
                                                <a class="view-type" href="javascript:void(0);" wire:click="changeViewType('grid')">
                                                    <img src="{{ asset('assets/backend/imgs/template/icons/icon-grid.svg') }}"
                                                         alt="jobBox">
                                                </a>
                                            @endif
                                            <a class="view-type" href="{{ route('backend.companies.create') }}">
                                                <img src="{{ asset('assets/backend/imgs/template/icons/add.svg') }}"
                                                     alt="jobBox">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($view_type == 'grid')
                            <div class="row">
                                @if($companies->total() > 0)
                                    @foreach($companies as $company)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12"
                                             onclick="window.location.href = '{{ route('backend.companies.show', ['company' => $company->id]) }}'">
                                            <div class="card-grid-2 hover-up cursor-pointer">
                                                <div class="card-grid-2-image-left">
                                                    <span class="flash"></span>
                                                    <div class="image-box">
                                                        <img src="{{ $company->photo_url }}" alt="jobBox">
                                                    </div>
                                                    <div class="right-info">
                                                        <a class="name-job"
                                                           href="{{ route('backend.companies.show', ['company' => $company->id]) }}">
                                                            {{ $company->name }} {{ $company->last_name }}
                                                        </a>
                                                        <span class="location-small">
                                                            {{ $company->category->name }},
                                                            {{ $company->city->name }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="card-block-info">
                                                    <p class="font-sm color-text-paragraph">{{ $company->description_trimmed }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No se encontraron resultados</p>
                                @endif
                            </div>

                        @else
                            @if($companies->total() > 0)
                                <div class="table-responsive">
                                    <table class="table datatable table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo Electrónico</th>
                                            <th>Teléfono</th>
                                            <th>Ubicación</th>
                                            <th class="btn-actions">Estado</th>
                                            <th class="btn-actions"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($companies as $company)
                                            <tr class="cursor-pointer"
                                                onclick="redirectTo('{{ route('backend.companies.show', ['company' => $company->id]) }}');">
                                                <td>{{ $company->name }}</td>
                                                <td>{{ $company->email }}</td>
                                                <td>{{ $company->telephone }}</td>
                                                <td>{{ $company->city->department->name }}, {{ $company->city->name }}</td>
                                                <td class="td-status">
                                                    @if($company->is_active)
                                                        <span class="badge badge-pill badge-primary">
                                                        <i class="fa fa-check-circle me-1"></i>
                                                        Activo
                                                    </span>
                                                    @else
                                                        <span class="badge badge-pill badge-secondary">
                                                        <i class="fa fa-ban me-1"></i>
                                                        Inactivo
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <a href="{{ route('backend.companies.show', ['company' => $company->id]) }}"
                                                       class="btn btn-sm btn-primary me-2">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="mt-30">No se encontraron resultados</p>
                            @endif
                        @endif

                        {{ $companies->links('custom-pagination-links-view') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        window.addEventListener('reloadDataTable', (e) => {
            loadDataTable();
        });
    </script>
@endsection
