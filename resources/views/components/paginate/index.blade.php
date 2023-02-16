<div class="row">
    <div class="col-lg-12">
        @if($paginate->hasPages())
            <div class="product__pagination">
                @if ($pageCount > 3)
                    @if ( $paginate->currentPage() == $paginate->lastPage() )
                        <a href="{{ $paginate->url(1) }}">{{ 1 }}</a>
                        <span>...</span>
                        <a href="{{$paginate->url($paginate->currentPage() - 1)}}">{{ $paginate->currentPage() - 1}}</a>
                        <a href="{{$paginate->url($paginate->currentPage() - 2)}}">{{ $paginate->currentPage() - 2 }}</a>
                        <a class="active" href="{{$paginate->url($paginate->currentPage())}}">{{ $paginate->currentPage() }}</a>
                    @elseif($paginate->currentPage() == 1)
                        <a class="active" href="{{$paginate->url($paginate->currentPage())}}">{{ $paginate->currentPage() }}</a>
                        <a href="{{$paginate->url($paginate->currentPage() + 1)}}">{{ $paginate->currentPage() + 1}}</a>
                        <a href="{{$paginate->url($paginate->currentPage() + 2)}}">{{ $paginate->currentPage() + 2 }}</a>
                        <span>...</span>
                        <a href="{{ $paginate->url($paginate->lastPage()) }}">{{ $paginate->lastPage() }}</a>
                    @else
                        <a href="{{$paginate->url($paginate->currentPage() - 1)}}">{{ $paginate->currentPage() - 1}}</a>
                        <a class="active" href="{{$paginate->url($paginate->currentPage())}}">{{ $paginate->currentPage() }}</a>
                        <a href="{{$paginate->url($paginate->currentPage() + 1)}}">{{ $paginate->currentPage() + 1 }}</a>
                        <span>...</span>
                        <a href="{{ $paginate->url($paginate->lastPage()) }}">{{ $paginate->lastPage() }}</a>
                    @endif
                @else
                    @for($i = 1; $i <= $pageCount; $i++)
                        <a href="{{ $paginate->url($i) }}" {{$paginate->currentPage() == $i ? "class=active" : ''}}>{{$i}}</a>
                    @endfor
                @endif




            </div>
        @endif
    </div>
</div>

