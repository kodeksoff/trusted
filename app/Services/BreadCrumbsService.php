<?php

namespace App\Services;

use App\Services\CategoryBuilder\CategoryService;

class BreadCrumbsService
{
    private static $instance = null;

    public static function instance()
    {
        return static::$instance ?? (static::$instance = new BreadCrumbsService());
    }

    public function build()
    {
        $array = [];
        $categories = CategoryService::instance();
        foreach ($categories->category as $key => $category) {
            $array[$key]['title'] = $category['title'];
            $array[$key]['url'] = '/' . $categories[$key]['slug'];
        }

        return $array;
    }
}
