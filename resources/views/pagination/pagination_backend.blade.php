@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination float-right">
            {{-- First Page --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link">&laquo;&laquo;</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link">&laquo;</a>
                </li>
            @else
                <li><a class="page-link" href="{{ $paginator->url(1) }}" rel="prev">&laquo;&laquo;</a></li>
                <li><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item" disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                <li>
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}"
                        rel="next">&raquo;&raquo;</a>
                <li>
            @else
                <li class="page-item disabled">
                    <a class="page-link">&raquo;</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link">&raquo;&raquo;</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
