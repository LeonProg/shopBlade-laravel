<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="{{ (isset($product->images[0]['image_path'])) ? $product->images[0]['image_path'] : 'img/clients/client-8.png'   }}">
            <ul class="product__hover">
                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                </li>
                <li><a href="{{ route('product', $product->id) }}" target="_blank"><img src="img/icon/search.png" alt=""></a></li>
            </ul>
        </div>
        <div class="product__item__text">
            <h6>{{ $product->title }}</h6>
            <a href="#" class="add-cart">+ Add To Cart</a>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <h5>{{ $product->price }} руб</h5>
            <div class="product__color__select">
                <label for="pc-4">
                    <input type="radio" id="pc-4">
                </label>
                <label class="active black" for="pc-5">
                    <input type="radio" id="pc-5">
                </label>
                <label class="grey" for="pc-6">
                    <input type="radio" id="pc-6">
                </label>
            </div>
        </div>
    </div>
</div>
