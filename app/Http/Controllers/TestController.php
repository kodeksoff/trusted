<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryBuilder\CategoryService;
use App\Services\MetaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller
{
    public function test()
    {
    }

    public function category($path)
    {

        $category = new CategoryService();



        dd($category->get($path), $category->generateUri($path), \request()->path());

    }

/*    public function create(array $category, string $chain)
    {
        $arr = [];
        $cur = [];

        for ($i = 0; $i < count($category); $i++) {
            if ($chain === $category[$i]['slug']) {
                $cur[$i] = $category[$i];

            foreach ($cur as $c) {
                if ($c['parent_id'] !== null) {
                    $arr = $this->buildTree($category, $category[$i]['parent_id']) + $cur;
                }
            }
        }



        return $arr;
    }

    public function buildTree(array $elements, $parentId = null)
    {

        $branch = [];

        for ($i = 0; $i < count($elements); $i++) {
            if ($elements[$i]['id'] === $parentId) {
                $next = $this->buildTree($elements, $elements[$i]['parent_id']);
                if($next) {
                    $branch = $next;
                }
                $branch[$i] = $elements[$i];
            }
        }

        return $branch;
    }*/
}
