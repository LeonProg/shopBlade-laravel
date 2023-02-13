<div class="row">
    <div class="col-lg-12">
        @if($paginate->hasPages())
        <div class="product__pagination">
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
        </div>
        @endif
    </div>
</div>

