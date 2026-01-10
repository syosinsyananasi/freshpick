@if ($paginator->hasPages())
    <nav class="pagination">
        @if ($paginator->onFirstPage())
            <span class="pagination__arrow pagination__arrow--disabled">&lt;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination__arrow">&lt;</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="pagination__dots">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="pagination__number pagination__number--active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="pagination__number">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination__arrow">&gt;</a>
        @else
            <span class="pagination__arrow pagination__arrow--disabled">&gt;</span>
        @endif
    </nav>
@endif
