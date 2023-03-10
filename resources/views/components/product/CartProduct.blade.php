<tr>
    <td class="product__cart__item">
        <div class="product__cart__item__pic">
            <img style="width: 100px; height: 100px" src="{{ (isset($product->image_path)) ? $product->image_path : 'img/clients/client-8.png' }}" alt="">
        </div>
        <div class="product__cart__item__text">
            <h6>{{ $product->title }}</h6>
            <h5>{{ $product->price }} руб</h5>
        </div>
    </td>
    <td class="quantity__item">
        <div class="quantity">
            <div class="pro-qty-2">
                <input type="text" value="{{ $product->pivot->quantity }}">
            </div>
        </div>
    </td>
    <td class="cart__price">$ 30.00</td>
    <td class="cart__close">
        <form method="POST" action="{{ route('removeFromCart', $product->pivot->id) }}">
            @csrf
            @method('delete')
            <button class="btn" type="submit"><i class="fa fa-close"></i></button>
        </form>


    </td>
</tr>
