
@if ($paginator->hasPages())
<!-- Row -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
        <!-- Pagination -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="pagination p-center">
                    @if ($paginator->onFirstPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                            <span class="ti-arrow-left"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                            <span class="ti-arrow-left"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif

                    @foreach ($elements as $element)

                        @if (is_string($element))
                            <li class="page-item">{{ $element }}</li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif

                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                            <span class="ti-arrow-right"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                            <span class="ti-arrow-right"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- /Row -->
@endif
