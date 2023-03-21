<div class="container">
    <div class="row flex-row-reverse">
        <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
            <div class="content-page">
                <div class="box-filters-job">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5">
                            <span class="font-sm text-showing color-text-paragraph">
                                @if($offers->total() > 0)
                                    Mostrando
                                    {{ $offers->count() * ($offers->currentPage() - 1) + 1 }}-{{ $offers->count() }}
                                    de {{ $offers->total() }} ofertas
                                @else
                                    Mostrando
                                    0-0
                                    de {{ $offers->total() }} ofertas
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div wire:loading.remove>
                @if($view_type == 'grid')
                    <div class="row">
                        @if($offers->total() > 0)
                            @foreach($offers as $offer)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12"
                                     onclick="window.location.href = '{{ route('frontend.offers.show', ['offer' => $offer->id]) }}'">
                                    <div class="card-grid-2 hover-up cursor-pointer">
                                        <div class="card-grid-2-image-left">
                                            <span class="flash"></span>
                                            <div class="image-box">
                                                <img src="{{ $offer->company->photo_url }}" alt="jobBox">
                                            </div>
                                            <div class="right-info">
                                                <a class="name-job"
                                                   href="{{ route('frontend.offers.show', ['offer' => $offer->id]) }}">{{ $offer->company->name }}</a>
                                                <span class="location-small">
                                            {{ $offer->city->department->name }},
                                            {{ $offer->city->name }}
                                        </span>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6>
                                                <a href="{{ route('frontend.offers.show', ['offer' => $offer->id]) }}">{{ $offer->title }}</a>
                                            </h6>
                                            <div class="mt-5">
                                                <span class="card-briefcase">{{ $offer->jobType->name }}</span>
                                                <span class="card-time">{{ $offer->experience->name }}</span>
                                            </div>
                                            <div class="mt-5">
                                        <span class="card-briefcase">
                                            @if($offer->salary)
                                                {{ $offer->jobType->name }}
                                            @else
                                                Salario No Definido
                                            @endif
                                        </span>
                                                <span class="card-time">
                                            {{ $offer->posted_at_time_ago }}
                                        </span>
                                            </div>
                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-12 text-end">
                                                        <div class="btn btn-apply-now">
                                                            <a href="#" class="text-primary text-apply-now" style="font-weight: 500;">
                                                                Ver Oferta
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="d-flex @if($view_type == 'list') mt-30 @endif">
                                @include('frontend.partials.livewire-no-results-found')
                            </div>
                        @endif
                    </div>
                @else
                    @if($offers->total() > 0)
                        <div class="row display-list">
                            @foreach($offers as $offer)
                                <div class="col-xl-12 col-12"
                                     onclick="window.location.href = '{{ route('frontend.offers.show', ['offer' => $offer->id]) }}'">
                                    <div class="card-grid-2 hover-up cursor-pointer">
                                        <span class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img src="{{ $offer->company->photo_url }}" alt="jobBox"></div>
                                                    <div class="right-info">
                                                        <a class="name-job" href="">{{ $offer->company->name }}</a>
                                                        <span class="text-profession p-0">
                                                            {{ $offer->city->department->name }}, {{ $offer->city->name }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h6>
                                                <a href="{{ route('frontend.offers.show', ['offer' => $offer->id]) }}">{{ $offer->title }}</a>
                                            </h6>
                                            <div class="mb-5">
                                                <span class="card-briefcase">{{ $offer->jobType->name }}</span>
                                                <span class="card-time">Exp. {{ $offer->experience->name }}</span>
                                                @if($offer->salary)
                                                    <span class="card-time">{{ $offer->salary_formatted }} Gs.</span>
                                                @else
                                                    <span class="card-time">Salario No Definido</span>
                                                @endif
                                                <span class="card-time"> {{ $offer->posted_at_time_ago }} </span>
                                            </div>
                                            <p class="font-xs color-text-paragraph-2 mt-2 mb-0">{{ $offer->description_trimmed_extended ?? 'Sin Descripción' }}</p>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-12 text-end">
                                                        <div class="btn btn-apply-now">
                                                            <a href="#" class="text-primary text-apply-now" style="font-weight: 500;">
                                                                Ver Oferta
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="d-flex @if($view_type == 'list') mt-30 @endif">
                            @include('frontend.partials.livewire-no-results-found')
                        </div>
                    @endif
                @endif

                    {{ $offers->links('custom-pagination-links-view') }}
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
                    <p class="ms-2">Buscando ofertas...</p>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-12" wire:ignore>
            <div class="sidebar-shadow none-shadow mb-30">
                <div class="sidebar-filters">
                    <div class="filter-block head-border mb-30">
                        <h5>Filtros Avanzados <a class="link-reset" href="#" wire:click="resetFilters">Limpiar</a></h5>
                    </div>
                    <div class="filter-block mb-30">
                        <h5 class="medium-heading mb-15">Categoría</h5>
                        <div class="form-group select-style select-style-icon">
                            <select class="form-control form-icons select-active" id="category_id" wire:model="category_selected">
                                <option value="" selected>Seleccionar Todo</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select><i class="fi-rr-marker"></i>
                        </div>
                    </div>
                    <div class="filter-block mb-30">
                        <h5 class="medium-heading mb-15">Tipo de Trabajo</h5>
                        <div class="form-group select-style select-style-icon">
                            <select class="form-control form-icons select-active" id="job_type_id" wire:model="job_type_selected">
                                <option value="" selected>Seleccionar Todo</option>
                                @foreach($job_types as $job_type)
                                    <option value="{{ $job_type->id }}">{{ $job_type->name }}</option>
                                @endforeach
                            </select><i class="fi-rr-marker"></i>
                        </div>
                    </div>
                    <div class="filter-block mb-30">
                        <h5 class="medium-heading mb-15">Experiencia</h5>
                        <div class="form-group select-style select-style-icon">
                            <select class="form-control form-icons select-active" id="experience_id" wire:model="experience_selected">
                                <option value="" selected>Seleccionar Todo</option>
                                @foreach($experiences as $experience)
                                    <option value="{{ $experience->id }}">{{ $experience->name }}</option>
                                @endforeach
                            </select><i class="fi-rr-marker"></i>
                        </div>
                    </div>
                    <div class="filter-block mb-30">
                        <h5 class="medium-heading mb-15">Empresas</h5>
                        <div class="form-group select-style select-style-icon">
                            <select class="form-control form-icons select-active" id="company_id" wire:model="company_selected">
                                <option value="" selected>Seleccionar Todo</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select><i class="fi-rr-marker"></i>
                        </div>
                    </div>
                    <div class="filter-block mb-30">
                        <h5 class="medium-heading mb-15">Ubicación</h5>
                        <div class="form-group select-style select-style-icon">
                            <select class="form-control form-icons select-active" id="city_id" wire:model="city_selected">
                                <option value="" selected>Seleccionar Todo</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->department->name }}, {{ $city->name }}</option>
                                @endforeach
                            </select><i class="fi-rr-marker"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @if($initial_payload)
        @if($category_selected)
            <script>$("#category_id").val({{ $category_selected }}).trigger('change');</script>
        @endif

        @if($city_selected)
            <script>$("#city_id").val({{ $city_selected }}).trigger('change');</script>
        @endif

        <script>Livewire.emit('unloadPayload')</script>
    @endif
    <script>
        $(function () {
            $('#category_id').on('change', function (e) {
                let data = $(this).select2("val");

                @this.
                set('category_selected', data);
            });

            $('#job_type_id').on('change', function (e) {
                let data = $(this).select2("val");

                @this.
                set('job_type_selected', data);
            });

            $('#experience_id').on('change', function (e) {
                let data = $(this).select2("val");

                @this.
                set('experience_selected', data);
            });

            $('#company_id').on('change', function (e) {
                let data = $(this).select2("val");

                @this.
                set('company_selected', data);
            });

            $('#city_id').on('change', function (e) {
                let data = $(this).select2("val");

                @this.
                set('city_selected', data);
            });

            window.addEventListener('contentChanged', (e) => {
                $('.select-active').select2();
            });

        });
    </script>
@endsection
