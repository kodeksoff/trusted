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

        $chains = collect(explode('/', $path))->slice(-1, 1);

        $category = Category::with('childrenRecursive')->whereSlug($chains->first())->first();

        $d = $category->toArray();

        dd($category->toArray(), $d);

        $products = $category->products;

        app(MetaBuilder::class)
            ->title($category->title)
            ->description($category->description);

        return view('pages.catalog.category', compact('category', 'products'));
    }

    public function c(array $array)
    {
        #subs = [];
    }
}
