@if (isset($paginator))
@php
    $queryParams = (isset($appends) && gettype($appends) === 'array') ? '&' . http_build_query($appends) : '';
@endphp
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between items-center mt-8 px-2">
        <div class="text-gray-500 text-sm font-medium bg-white px-4 py-2 rounded-xl border border-gray-100 shadow-sm">
            Página <span class="text-indigo-600 font-bold">{{ $paginator->currentPage() }}</span> de <span class="text-gray-900 font-bold">{{ $paginator->lastPage() }}</span>
        </div>
        
        <div class="flex items-center gap-3">
            {{-- Previous Page Link --}}
        @if ($paginator->isFirstPage())
            <span class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-gray-400 bg-gray-50 border border-gray-100 rounded-xl cursor-not-allowed transition-all duration-200 shadow-sm opacity-60">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Anterior
            </span>
        @else
            <a href="?page={{ $paginator->getNumberPreviousPage() }}{{ $queryParams }}" rel="prev" class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-indigo-300 hover:text-indigo-600 transition-all duration-300 shadow-sm hover:shadow-md active:scale-95 group">
                <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Anterior
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->isLastPage())
            <span class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-gray-400 bg-gray-50 border border-gray-100 rounded-xl cursor-not-allowed transition-all duration-200 shadow-sm opacity-60">
                Próximo
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </span>
        @else
            <a href="?page={{ $paginator->getNumberNextPage() }}{{ $queryParams }}" rel="next" class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-indigo-300 hover:text-indigo-600 transition-all duration-300 shadow-sm hover:shadow-md active:scale-95 group">
                Próximo
                <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        @endif
    </nav>
@endif
