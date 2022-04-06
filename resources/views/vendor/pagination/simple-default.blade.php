@if ($paginator->hasPages())

        <nav class="blog-pagination" role="navigation">
            @if ($paginator->onFirstPage())
                <a class="btn btn-outline-secondary disabled" href="#">@lang('pagination.previous')</a>
            @else
                <a class="btn btn-outline-primary" href="{{ $paginator->previousPageUrl() }}" rel="next">@lang('pagination.previous')</a>
            @endif

            @if ($paginator->hasMorePages())
                <a class="btn btn-outline-primary" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            @else
                <a class="btn btn-outline-secondary disabled" href="#">@lang('pagination.next')</a>
            @endif
        </nav>
@endif
