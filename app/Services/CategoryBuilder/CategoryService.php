<?php

namespace App\Services\CategoryBuilder;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryService
{
    public $chains;

    public function get($path)
    {
        $chain = $this->chains($path)->last();
        return $this->findCurrentCategory($chain);
    }

    public function generateUri($path)
    {
        $chain = $this->chains($path)->last();
        $array =  $this->findCurrentCategory($chain);
        $slug = null;
        foreach ($array as $item) {
            $slug .= '/'. $item['slug'];
        }
        return $slug;
    }

    protected function chains(string $path)
    {
        $chains = collect(explode('/', $path));
        return $this->chains = $chains;
    }

    protected function findCurrentCategory(string $slug)
    {
        $categories = CategoryCacheService::create();
        foreach ($categories as $key => $category) {
            if ($category['slug'] === $slug && $category['parent_id'] === null) {
                return $category;
            }
            if ($category['slug'] === $slug && $category['parent_id'] !== null) {
                return $this->findParentCategory($categories, $category);
            }
        }
        return abort(404);
    }

    protected function findParentCategory(array &$categories, $lastCategory = null)
    {
        $array = [];
        foreach ($categories as $key => $category) {
            if ($category['id'] === $lastCategory['parent_id']) {
                $recursive = $this->findParentCategory($categories, $category);
                $array = $this->checkRecursive($recursive);
                $array[$key] = $category;
            }
        }
        array_push($array, $lastCategory);
        return array_values($array);
    }

    protected function checkRecursive(array $recursive)
    {
        return $recursive ? $recursive : false;
    }
}
