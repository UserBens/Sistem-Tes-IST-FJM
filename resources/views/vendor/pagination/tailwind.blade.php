@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
        class="flex flex-col sm:flex-row items-center justify-between gap-3 mt-4">

        {{-- Info teks --}}
        <div class="text-sm text-gray-500">
            {!! __('Menampilkan') !!}
            <span class="font-semibold text-gray-700">{{ $paginator->firstItem() }}</span>
            –
            <span class="font-semibold text-gray-700">{{ $paginator->lastItem() }}</span>
            {{ __('dari') }}
            <span class="font-semibold text-gray-700">{{ $paginator->total() }}</span>
            {{ __('data') }}
        </div>

        {{-- Tombol navigasi --}}
        <div class="flex items-center gap-1">

            {{-- Prev --}}
            @if ($paginator->onFirstPage())
                <span
                    class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-indigo-200 bg-white text-indigo-600 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition-all duration-200 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            @endif

            {{-- Nomor halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span
                        class="inline-flex items-center justify-center w-9 h-9 text-sm text-gray-400 select-none">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span
                                class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-sm font-semibold text-white bg-indigo-600 border border-indigo-600 shadow-md shadow-indigo-200 select-none">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-sm font-medium text-gray-600 bg-white border border-gray-200 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-300 transition-all duration-200 shadow-sm">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-indigo-200 bg-white text-indigo-600 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition-all duration-200 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @else
                <span
                    class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            @endif

        </div>
    </nav>
@endif
