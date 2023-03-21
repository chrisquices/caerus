<div class="row">
    <div class="col-lg-12">
        <div class="section-box">
            <div class="container">
                <div class="panel-white mb-30">
                    <div class="box-padding">
                        <div class="box-filters-job @if($view_type == 'list') mb-0 @endif">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5">
                                    <span class="font-sm text-showing color-text-paragraph">
                                        @if($quick_offers->total() > 0)
                                            Mostrando
                                            {{ $quick_offers->count() * ($quick_offers->currentPage() - 1) + 1 }}-{{ $quick_offers->count() }}
                                            de {{ $quick_offers->total() }} ofertas rápidas
                                        @else
                                            Mostrando
                                            0-0
                                            de {{ $quick_offers->total() }} ofertas rápidas
                                        @endif
                                    </span>
                                </div>
                                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                    <div class="display-flex2">
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
                                            <a class="view-type" href="{{ route('backend.quick_offers.create') }}">
                                                <img src="{{ asset('assets/backend/imgs/template/icons/add.svg') }}" alt="jobBox">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div wire:loading.remove>
                            @if($view_type == 'grid')
                                <div class="row">
                                    @if($quick_offers->total() > 0)
                                        @foreach($quick_offers as $quick_offer)
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12"
                                                 onclick="window.location.href = '{{ route('backend.quick_offers.show', ['quick_offer' => $quick_offer->id]) }}'">
                                                <div class="card-grid-2 hover-up cursor-pointer">
                                                    <a href="{{ $quick_offer->photo_url }}" target="_blank">
                                                        <img src="{{ $quick_offer->photo_url }}" alt="">
                                                    </a>
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
                                @if($quick_offers->total() > 0)
                                    <div class="table-responsive">
                                        <table class="table datatable table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>Oferta Rápida ID</th>
                                                <th>Archivo</th>
                                                <th>Publicado el</th>
                                                <th class="btn-actions"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($quick_offers as $quick_offer)
                                                <tr class="cursor-pointer" onclick="redirectTo('{{ route('backend.quick_offers.show', ['quick_offer' => $quick_offer->id]) }}');">
                                                    <td>{{ $quick_offer->id_formatted }}</td>
                                                    <td>{{ $quick_offer->photo }}</td>
                                                    <td>{{ $quick_offer->created_at_formatted }}</td>
                                                    <td class="text-end">
                                                        <a href="{{ route('backend.quick_offers.show', ['quick_offer' => $quick_offer->id]) }}"
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

                            {{ $quick_offers->links('custom-pagination-links-view') }}
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
                                <p class="ms-2">Buscando ofertas rápidas...</p>
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
