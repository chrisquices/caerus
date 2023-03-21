@if ($paginator->hasPages())
    <div class="paginations">
        <ul class="pager">
            @if ($paginator->onFirstPage())
                <li><a class="pager-prev pager-prev-disabled" href="#" disabled></a></li>
            @else
                <li><a href="#" rel="prev" class="pager-prev" wire:click="previousPage" wire:loading.attr="disabled"></a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pager-number active" href="#" wire:key="paginator-page-{{ $page }}">{{ $page }}</a></li>
                        @else
                            <li><a class="pager-number" href="#" wire:key="paginator-page-{{ $page }}" wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li><a href="#" rel="next" class="pager-next" wire:click="nextPage" wire:loading.attr="disabled"></a></li>
            @else
                <li><a class="pager-next pager-next-disabled" href="#" disabled></a></li>
            @endif
        </ul>
    </div>
@endif
