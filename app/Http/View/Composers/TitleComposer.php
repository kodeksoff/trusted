<?php

namespace App\Http\View\Composers;

use App\Services\MetaBuilder;
use Illuminate\View\View;

class TitleComposer
{
    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $title = app(MetaBuilder::class)->title;

        $view->with('title', $title);
    }
}
