<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Categories extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'categories';
    }
}
