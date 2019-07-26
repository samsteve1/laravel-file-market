@if ($paginator->hasPages())
    <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
    
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="button is-primary" disabled>@lang('pagination.previous')</a> 
            {{-- <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li> --}}
        @else
        @if (request()->has('q'))
            <?php 
                $previousPageNumber = substr($paginator->previousPageUrl(), -1);
                $query = http_build_query(['q' => request()->q, 'page' => $previousPageNumber]);

                $previousPageUrl = request()->url() . '?' . $query;
            ?>
            <a href="{{ $previousPageUrl }}" class="pagination-previous button is-primary">@lang('pagination.previous')</a> 
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous button is-primary">@lang('pagination.previous')</a> 
        @endif
        
            {{-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li> --}}
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())

            @if (request()->has('q'))
                <?php 
                    $nextPageNumber = substr($paginator->nextPageUrl(), -1);
                    $query = http_build_query(['q' => request()->q, 'page' => $nextPageNumber]);

                    $nextPageUrl = request()->url() . '?' . $query;
                ?>
                
            <a href="{{ $nextPageUrl }}" class="pagination-next button is-primary">@lang('pagination.next')</a>
            @else
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next button is-primary">@lang('pagination.next')</a>
            @endif
            
            {{-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li> --}}
        @else
        <a class=" button pagination-next is-disabled is-primary" disabled>@lang('pagination.next')</a>
            {{-- <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li> --}}
        @endif

          <ul class="pagination-list" style="list-style-type:none;">
               {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current" aria-label="Page {{ $page }}" aria-current="page">{{ $page }}</a></li>
                            {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                           
                        @else
                            @if (request()->has('q'))
                               
                             <li><a href="{{ request()->url() . '?' . http_build_query(['q' => request()->q, 'page' => $page]) }}" class="pagination-link" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                            @else
                             <li><a href="{{ $url }}" class="pagination-link" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                            @endif
                            
                           
                            {{-- <li><span class="pagination-ellipsis">&hellip;</span></li> --}}
                            {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                        @endif
                    @endforeach
                @endif
            @endforeach

          </ul>
          @if (request()->has('q'))
            {{-- {{ request()->url() . http_build_query(['q' => 'hhhhhh', 'n' => 'jjj']) }}   --}}
            
          @endif
    </nav>

    
@endif


        
        
     
      