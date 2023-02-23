<?php

namespace App\View\Composers;

use App\Models\Cart;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view)
    {
        if (Auth::user()) {
            $cart = Auth::user()->carts;
            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalPrice += $item->price * $item->pivot->quantity;
            }


            $view->with('totalPrice', $totalPrice);
        }
    }
}
