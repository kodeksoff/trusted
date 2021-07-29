<?php

namespace App\Http\View\Composers;

use App\Services\MetaBuilder;
use Illuminate\View\View;

class MetaComposer
{
    public function __construct() {}

    public function compose(View $view)
    {
        $meta = $this->hasViewMeta($view);

        $view->with('title', $meta->title)->with('description', $meta->description);
    }

    public function hasViewMeta($view)
    {
        return $view->title || $view->description ? $view : app(MetaBuilder::class);
    }
}
