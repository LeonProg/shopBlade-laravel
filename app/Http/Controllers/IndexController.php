<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function catalog(ProductFilter $filter)
    {
        $products = Product::query()
            ->filter($filter)
            ->select(['id', 'title', 'price'])
            ->with('images:id,product_id,image_path', 'ratings:id,product_id,rating')
            ->orderByDesc('created_at')
            ->paginate(12)
            ->withQueryString();

        $categories = Category::query()
            ->select(['id', 'title', 'slug'])
            ->withCount('products')
            ->get();

        $brands = Brand::query()
            ->select(['id', 'title', 'slug'])
            ->get();

        $pageCount = ceil($products->total() / $products->perPage());

        return view('shop', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'pageCount' => $pageCount,
        ]);
    }

    public function product(Product $product)
    {
        $product = $product->with('images:id,product_id,image_path')->find($product->id);

        return view('productPage', [
            'product' => $product
        ]);
    }

    public function blog()
    {
        return view('blog');
    }

    public function cart()
    {
        $products = [];
        $user = $this->UserCart();

        foreach ($user as $item) {
            $productId = $item->pivot->product_id;
            $productImage = ProductImage::query()
                ->select('image_path')
                ->where('product_id', $productId)
                ->first();


            $itemData = json_decode(json_encode($item), false);  // конвертируем массив в объект
            $itemData->image_path = $productImage->image_path;

            $products[] = $itemData;
        }


        return view('cart', [
            'products' => $products,
        ]);
    }

    private function UserCart()
    {
        return Auth::user()->carts;
    }
}
