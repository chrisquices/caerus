<div class="row">
    <div class="col-lg-12">
        <div class="section-box">
            <div class="container">
                <div class="panel-white mb-30">
                    <div class="box-padding">
                        <div class="box-filters-job @if($view_type == 'list') mb-0 @endif">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5"><span class="font-sm text-showing color-text-paragraph">
                                        @if($candidates->total() > 0)
                                            Mostrando
                                            {{ $candidates->count() * ($candidates->currentPage() - 1) + 1 }}-{{ $candidates->count() }}
                                            de {{ $candidates->total() }} ofertas
                                        @else
                                            Mostrando
                                            0-0
                                            de {{ $candidates->total() }} ofertas
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
                                            <a class="view-type" href="{{ route('backend.candidates.create') }}">
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
                                    @if($candidates->total() > 0)
                                        @foreach($candidates as $candidate)
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12"
                                                 onclick="window.location.href = '{{ route('backend.candidates.show', ['candidate' => $candidate->id]) }}'">
                                                <div class="card-grid-2 hover-up cursor-pointer">
                                                    <div class="card-grid-2-image-left">
                                                        <span class="flash"></span>
                                                        <div class="image-box">
                                                            <img src="{{ $candidate->user->photo_url }}" alt="jobBox">
                                                        </div>
                                                        <div class="right-info">
                                                            <a class="name-job"
                                                               href="{{ route('backend.candidates.show', ['candidate' => $candidate->id]) }}">
                                                                {{ $candidate->user->name }} {{ $candidate->user->last_name }}
                                                            </a>
                                                            <span class="location-small">
                                                            {{ $candidate->city->department->name }}, {{ $candidate->city->name }}
                                                        </span>
                                                        </div>
                                                    </div>

                                                    <div class="card-block-info">

                                                        <div class="mb-5">
                                                            <span class="card-briefcase">{{ $candidate->profession->name }}</span>
                                                            <span class="card-time">Exp. {{ $candidate->experience->name }}</span>
                                                        </div>
                                                        <p class="font-xs color-text-paragraph-2 mt-2 mb-0">{{ $candidate->about_me_trimmed ?? 'Sin Descripción' }}</p>

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
                                @if($candidates->total() > 0)
                                    <div class="table-responsive">
                                        <table class="table datatable table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>Titulo</th>
                                                <th>Tipo</th>
                                                <th>Experiencia</th>
                                                <th>Salario</th>
                                                <th class="btn-actions">Estado</th>
                                                <th class="btn-actions"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($candidates as $candidate)
                                                <tr class="cursor-pointer"
                                                    onclick="redirectTo('{{ route('backend.candidates.show', ['candidate' => $candidate->id]) }}');">
                                                    <td>{{ $candidate->title }}</td>
                                                    <td>{{ $candidate->jobType->name }}</td>
                                                    <td>{{ $candidate->experience->name }}</td>
                                                    <td>{{ $candidate->salario ?? 'Salario No Definido' }}</td>
                                                    <td class="td-status">
                                                        @if($candidate->is_active)
                                                            <span class="badge badge-pill badge-primary">
                                                        <i class="fa fa-check-circle me-1"></i>
                                                        Abierta
                                                    </span>
                                                        @else
                                                            <span class="badge badge-pill badge-secondary">
                                                            <i class="fa fa-ban me-1"></i>
                                                            Cerrada
                                                        </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="{{ route('backend.candidates.show', ['candidate' => $candidate->id]) }}"
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

                            {{ $candidates->links('custom-pagination-links-view') }}
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
                                <p class="ms-2">Buscando candidatos...</p>
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
