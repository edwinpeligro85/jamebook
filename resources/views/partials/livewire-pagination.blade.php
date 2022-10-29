@if ($paginator->hasPages())
    @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : ($this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1))

    <div class="pagination-block">
        <ul class="pagination-btns flex-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <button type="button" class="btn px-0" disabled>|<em class="zmdi zmdi-chevron-left"></em></button>
                </li>
                <li><button type="button" class="btn" disabled><em class="zmdi zmdi-chevron-left"></em></button></li>
            @else
                <li>
                    <button type="button" wire:click="gotoPage(1, '{{ $paginator->getPageName() }}')"
                        class="single-btn prev-btn ">|<em class="zmdi zmdi-chevron-left"></em>
                    </button>
                </li>

                <li>
                    <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        wire:loading.attr="disabled" rel="prev" class="single-btn prev-btn "><em
                            class="zmdi zmdi-chevron-left"></em>
                    </button>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <button class="disabled" aria-disabled="true" type="button" class="btn px-0" disabled>
                            <span class="h4 font-weight-bold">{{ $element }}</span>
                        </button>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"
                                wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"
                                aria-current="page">
                                <button type="button" class="single-btn">{{ $page }}</button>
                            </li>
                        @else
                            <li
                                wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                                <button type="button" class="single-btn"
                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                        rel="next" class="single-btn next-btn"><em class="zmdi zmdi-chevron-right"></em></button>
                </li>
                <li>
                    <button wire:click="gotoPage({{ $paginator->lastPage() }}, '{{ $paginator->getPageName() }}')"
                        class="single-btn next-btn" wire:loading.attr="disabled">
                        <em class="zmdi zmdi-chevron-right"></em>|
                    </button>
                </li>
            @else
                <li><button type="button" class="btn" disabled><em class="zmdi zmdi-chevron-right"></em></button>
                </li>
                <li>
                    <button type="button" class="btn px-0" disabled><em class="zmdi zmdi-chevron-right"></em>|</button>
                </li>
            @endif
        </ul>
    </div>
@endif
