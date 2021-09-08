<?php

namespace App\Http\Controllers;

use App\Facades\Categories;
use App\Models\Product;
use App\Services\CategoryBuilder\CategoryService;

class TestController extends Controller
{
    public function test()
    {
    }

    public function resolver($path)
    {
        $data = Categories::select();
        return Categories::resolver($this, $path);
    }

    public function category($categories)
    {
        $category = collect($categories)->pluck('id')->toArray();

        $products = Product::wherehas('categories', function ($query) use ($category) {
            $query->whereIn('category_id', $category);
        })->get();

        return view('pages.catalog.category', compact('products'));
    }
}
