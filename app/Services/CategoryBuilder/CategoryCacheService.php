<?php

namespace App\Services\CategoryBuilder;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryCacheService
{
    public static function create()
    {
        return Cache::rememberForever('categories', function () {
            return Category::get()->toArray();
        });
    }
}
