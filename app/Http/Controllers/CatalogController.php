<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
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


        return view('shop', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function product()
    {
        return view('productPage', []);
    }
}
