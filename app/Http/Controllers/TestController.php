<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\MetaBuilder;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
    }

    public function category($path)
    {
        $category = Category::whereProducts($path)->firstOrFail();
        $products = $category->products;

        app(MetaBuilder::class)
            ->title($category->title)
            ->description($category->description);

        return view('pages.catalog.category', compact('category', 'products'));
    }
}
