<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryBuilder\CategoryService;

class TestController extends Controller
{
    public function test()
    {
    }

    public function resolver($path)
    {

        return CategoryService::instance()->resolver($this, $path);
    }

    public function category($categories)
    {
        $category = collect($categories)->pluck('id')->toArray();
        $products = Product::wherehas('categories', function ($query) use ($category) {
            $query->whereIn('category_id', $category);
        })->get();
        return view('pages.catalog.category', compact('categories'));
    }
}
