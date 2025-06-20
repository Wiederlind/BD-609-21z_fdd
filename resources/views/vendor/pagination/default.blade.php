<div class="d-flex justify-content-between align-items-center my-2">
    <nav>
        <ul class="pagination justify-content-center mb-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach
            @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
            @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
            @endif
        </ul>
    </nav>
    <form method="get" action="{{ url()->current() }}" class="d-flex align-items-center">
        @foreach(request()->except(['page', 'perpage']) as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <label for="perpage" class="form-label me-2 ">Элементов на странице:</label>
        <select name="perpage" id="perpage" class="form-select w-auto me-2 " onchange="this.form.submit()">
            <option value="9" @if($paginator->perPage() == 9) selected @endif>9</option>
            <option value="18" @if($paginator->perPage() == 18) selected @endif>18</option>
            <option value="36" @if($paginator->perPage() == 36) selected @endif>36</option>
        </select>
    </form>
</div>