<div class="row">
    <div class="col-lg-12">
        <div class="section-box">
            <div class="container">
                <div class="panel-white mb-30">
                    <div class="box-padding">
                        <div class="box-filters-job @if($view_type == 'list') mb-0 @endif">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5"><span class="font-sm text-showing color-text-paragraph">
                                        @if($applications->total() > 0)
                                            Mostrando
                                            {{ $applications->count() * ($applications->currentPage() - 1) + 1 }}
                                            -{{ $applications->count() }}
                                            de {{ $applications->total() }} aplicaciones
                                        @else
                                            Mostrando
                                            0-0
                                            de {{ $applications->total() }} aplicaciones
                                        @endif

                                    </span>
                                </div>
                                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                    <div class="display-flex2">
                                        <div class="box-border me-2 hide-on-mobile">
                                            <span class="text-sortby">Buscar :</span>
                                            <div class="dropdown dropdown-sort custom-search-container">
                                                <input type="text" class="custom-search" value="" wire:model.debounce.500ms="search_term"
                                                       wire:keydown.debounce.500ms="resetPage">
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
                                            <a class="view-type" href="{{ route('backend.applications.create') }}">
                                                <img src="{{ asset('assets/backend/imgs/template/icons/add.svg') }}"
                                                     alt="jobBox">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div wire:loading.remove>
                            @if($view_type == 'grid')
                                <div class="row">
                                    @if($applications->total() > 0)
                                        @foreach($applications as $application)
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12"
                                                 onclick="window.location.href = '{{ route('backend.applications.show', ['application' => $application->id]) }}'">
                                                <div class="card-grid-2 hover-up cursor-pointer">
                                                    <div class="card-grid-2-image-left">
                                                        <span class="flash"></span>
                                                        <div class="image-box">
                                                            <img src="{{ $application->candidate->user->photo_url }}" alt="jobBox">
                                                        </div>
                                                        <div class="right-info">
                                                            <a class="name-job"
                                                               href="{{ route('backend.applications.show', ['application' => $application->id]) }}">
                                                                {{ $application->candidate->user->name }} {{ $application->candidate->user->last_name }}
                                                            </a>
                                                            <span class="location-small">
                                                            {{ $application->candidate->profession->name }}
                                                        </span>
                                                        </div>
                                                    </div>

                                                    <div class="card-block-info">
                                                        <h6><a href="#">{{ $application->offer->title }}</a></h6>

                                                        <div class="mt-30">
                                                            <a class="btn btn-grey-small text-{{ $application->status->color }} mr-5"
                                                               href="#">
                                                                {{ $application->status->name }}
                                                            </a>
                                                            @if($application->message)
                                                                <a class="btn btn-grey-small mr-5" href="#">Mensaje</a>
                                                            @endif
                                                            @if($application->cover_letter)
                                                                <a class="btn btn-grey-small mr-5" href="#">Carta de Presentación</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="d-flex @if($view_type == 'list') mt-30 @endif">
                                            @include('backend.partials.livewire-no-results-found')
                                        </div>
                                    @endif
                                </div>

                            @else
                                @if($applications->total() > 0)
                                    <div class="table-responsive">
                                        <table class="table datatable table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>Oferta</th>
                                                <th>Candidato</th>
                                                <th>Profesión</th>
                                                <th>Experiencia</th>
                                                <th>Edad</th>
                                                <th>Mensaje</th>
                                                <th>Carta de Presentación</th>
                                                <th class="btn-actions">Estado</th>
                                                <th class="btn-actions"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($applications as $application)
                                                <tr class="cursor-pointer"
                                                    onclick="redirectTo('{{ route('backend.applications.show', ['application' => $application->id]) }}');">
                                                    <td>{{ $application->offer->title }}</td>
                                                    <td>{{ $application->candidate->user->name }} {{ $application->candidate->user->last_name }}</td>
                                                    <td>{{ $application->candidate->profession->name }}</td>
                                                    <td>{{ $application->candidate->experience->name }}</td>
                                                    <td>{{ $application->candidate->age }}</td>
                                                    <td>
                                                        @if($application->message)
                                                            <span class="badge badge-pill badge-primary">
                                                            <i class="fa fa-check-circle me-1"></i>
                                                            Incluido
                                                        </span>
                                                        @else
                                                            <span class="badge badge-pill badge-secondary">
                                                            <i class="fa fa-ban me-1"></i>
                                                            Excluido
                                                        </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($application->cover_letter)
                                                            <span class="badge badge-pill badge-primary">
                                                            <i class="fa fa-check-circle me-1"></i>
                                                            Incluido
                                                        </span>
                                                        @else
                                                            <span class="badge badge-pill badge-secondary">
                                                            <i class="fa fa-ban me-1"></i>
                                                            Excluido
                                                        </span>
                                                        @endif
                                                    </td>
                                                    <td class="td-status">
                                                    <span class="badge badge-pill badge-{{ $application->status->color }}">
                                                        {{ $application->status->name }}
                                                    </span>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="{{ route('backend.applications.show', ['application' => $application->id]) }}"
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
                                    <div class="d-flex @if($view_type == 'list') mt-30 @endif">
                                        @include('backend.partials.livewire-no-results-found')
                                    </div>
                                @endif
                            @endif

                            {{ $applications->links('custom-pagination-links-view') }}
                        </div>

                        <div wire:loading>
                            <div class="d-flex @if($view_type == 'list') mt-30 @endif">
                                <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
                                <lord-icon
                                        src="https://cdn.lordicon.com/msoeawqm.json"
                                        trigger="loop"
                                        delay="100"
                                        colors="primary:#65779c,secondary:#3b65f4"
                                        stroke="70"
                                        style="width:24px;height:24px">
                                </lord-icon>
                                <p class="ms-2">Buscando aplicaciones...</p>
                            </div>
                        </div>
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
