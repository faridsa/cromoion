@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>Anterior</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Anterior</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Siguiente</a></li>
        @else
            <li class="disabled"><span>Siguiente</span></li>
        @endif
    </ul>
@endif
