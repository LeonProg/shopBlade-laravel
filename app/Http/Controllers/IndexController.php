<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return view('productPage', [
            'product' => $product
        ]);
    }

    public function blog()
    {
        return view('blog');
    }
}
