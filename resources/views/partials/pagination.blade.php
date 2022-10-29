@if ($paginator->hasPages())
    <div class="pagination-block">
        <ul class="pagination-btns flex-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled mr-5">|<i class="zmdi zmdi-chevron-left"></i></li>
                <li class="disabled mr-5"><i class="zmdi zmdi-chevron-left"></i></li>
            @else
                <li><a href="{{ $paginator->url(1) }}" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i>
                    </a></li>

                <li><a href="{{ $paginator->previousPageUrl() }}" class="single-btn prev-btn "><i
                            class="zmdi zmdi-chevron-left"></i>
                    </a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                            <li class="active"><a href="" class="single-btn">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="single-btn">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" class="single-btn next-btn"><i
                            class="zmdi zmdi-chevron-right"></i></a></li>
                <li><a href="{{ $paginator->url($paginator->lastPage()) }}" class="single-btn next-btn"><i
                            class="zmdi zmdi-chevron-right"></i>|</a></li>
            @else
                <li class="disabled mx-5"><i class="zmdi zmdi-chevron-right"></i></li>
                <li class="disabled"><i class="zmdi zmdi-chevron-right"></i>|</li>
            @endif
        </ul>
    </div>
@endif
