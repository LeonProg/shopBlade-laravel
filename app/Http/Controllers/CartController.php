<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        $user = Auth::user();
        $cartProduct = $user->hasCartProduct($product->id);

        if (!$cartProduct) {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        } else {
            $quantity  = Auth::user()->carts()->where('products.id', $product->id)->firstOrFail()->pivot->quantity;;
            $user->carts()->updateExistingPivot($product->id, ['quantity' => $quantity + 1]);
        }

        return back();
    }

    public function removeFromCart(Cart $cart)
    {
        if(Auth::id() === $cart->user_id)
        {
            $cart->delete();
            return back();
        }

        return  '403';
    }

    public function clearCart()
    {
        Auth::user()->carts()->detach();

        return back();
    }
}
