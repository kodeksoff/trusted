<?php

namespace App\Services\CategoryBuilder;

use App\Http\Controllers\TestController;

/**
 * Class CategoryService
 * @package App\Services\CategoryBuilder
 */
class CategoryService
{
    private static $instance = null;
    public $category;
    public $paths;
    public $uri;
    public $chains;

    /**
     * @return CategoryService
     */
    public static function instance(): CategoryService
    {
        return static::$instance ?? (static::$instance = new CategoryService());
    }

    /**
     * @param TestController $controller
     * @param $path
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function resolver(TestController $controller, $path)
    {
        $chain = $this->chains($path)->last();
        $this->category = $this->findCurrentCategory($chain);
        $this->uri = $this->generateUrl();
        $this->paths = $this->buildPaths($this->category);
        return $this->transfer($controller);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void|null
     */
   public function transfer($controller)
    {
        if (!request()->is($this->uri) && (config('catalog.seo_url') === true)) {
            return redirect($this->uri, 301);
        }
        if (!request()->is($this->uri) && (config('catalog.seo_url') === false)) {
            return abort(404);
        }
        return $controller->category($this->category);
    }

    /**
     * @return mixed
     */
    public function getCurrentCategory()
    {
        return collect($this->category)->last();
    }

    /**
     * @param $category
     * @return false|string
     */
    protected function generateUrl()
    {
        $slug = null;
        foreach ($this->category as $item) {
            $slug .= '/' . $item['slug'];
        }
        return substr($slug, 1);
    }

    /**
     * @param string $path
     * @return \Illuminate\Support\Collection
     */
    protected function chains(string $path): \Illuminate\Support\Collection
    {
        $chains = collect(explode('/', $path));
        return $this->chains = $chains;
    }

    /**
     * @param string $slug
     * @return array|false|void
     */
    protected function findCurrentCategory(string $slug)
    {
        $categories = CategoryCacheService::create();
        foreach ($categories as $key => $category) {
            if ($category['slug'] === $slug && $category['parent_id'] === null) {
                return $this->selectParentCategory($category);
            }
            if ($category['slug'] === $slug && $category['parent_id'] !== null) {
                return $this->findParentCategory($categories, $category);
            }
        }
        return abort(404);
    }

    /**
     * @param $categories
     * @return array
     */
    protected function selectParentCategory($categories): array
    {
        $array = [];
        array_push($array, $categories);
        return $array;
    }

    /**
     * @param array $categories
     * @param null $lastCategory
     * @return array|false
     */
    protected function findParentCategory(array &$categories, $lastCategory = null)
    {
        $array = [];
        foreach ($categories as $key => $category) {
            if ($category['id'] === $lastCategory['parent_id']) {
                $recursive = $this->findParentCategory($categories, $category);
                $array = $this->checkRecursive($recursive);
            }
        }
        array_push($array, $lastCategory);
        return array_values($array);
    }

    /**
     * @param array $recursive
     * @return array|false
     */
    protected function checkRecursive(array $recursive)
    {
        return $recursive ? $recursive : false;
    }

    /**
     * @param $categories
     * @return array
     */
    protected function buildPaths($categories): array
    {
        $array = [];
        foreach ($categories as $key => $category) {
            $array[$key]['title'] = $category['title'];
            if ($key == 0) {
                $array[$key]['slug'] = $category['slug'];
            }
            if ($key > 0) {
                $array[$key]['slug'] = $array[$key-1]['slug'] . '/' . $category['slug'];
            }
        }
        return $array;
    }
}
