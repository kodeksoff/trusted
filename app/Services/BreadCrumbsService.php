<?php

namespace App\Services;

use App\Services\CategoryBuilder\CategoryService;

class BreadCrumbsService
{
    private static $instance = null;

    public static function instance(): BreadCrumbsService
    {
        return static::$instance ?? (static::$instance = new BreadCrumbsService());
    }

    public function build($data = null): array
    {
        $array = [];
        $array = $this->addFromCatalog();
        array_unshift($array, ['title' => 'Главная', 'url' => '/']);
        return $array;
    }
    public function addFromCatalog(): array
    {
        $array = [];
        $categories = CategoryService::instance();
        if (!empty($categories->category)) {
            foreach ($categories->category as $key => $category) {
                $array[$key]['title'] = $category['title'];
                $array[$key]['url'] = '/' . $categories->paths[$key]['slug'] . '/';
            }
        }
        return $array;
    }
}
