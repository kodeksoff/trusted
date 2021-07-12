<?php

namespace App\Http\View\Composers;

use App\Services\MetaBuilder;
use Illuminate\View\View;

class MetaComposer
{
    public function __construct()
    {

    }

    public function compose(View $view)
    {
        if (!$view->title) {
            $meta = app(MetaBuilder::class);
        }
        $meta = $view;
        $view->with('title', $meta->title)->with('description', $meta->description);
    }
}
