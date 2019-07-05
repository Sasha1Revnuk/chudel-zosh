@if ($paginator->hasPages())
    <ul role="navigation" class="pagination pagination-sm remove-margin">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="prev disabled" aria-disabled="true">
                <a><i class="fa fa-chevron-left"></i></a>
            </li>
        @else
            <li class="prev">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" ><i class="fa fa-chevron-left"></i></a>
            </li>
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
                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" ><i class="fa fa-chevron-right"></i></a>
            </li>
        @else
            <li class="next disabled" aria-disabled="true">
                <a><i class="fa fa-chevron-right"></i></a>
            </li>
        @endif
    </ul>
@endif
