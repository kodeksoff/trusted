<?php

namespace App\Http\Controllers;

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
        return view('pages.catalog.category', compact('categories'));
    }
}
