<?php

namespace App\Http\View\Composers;

use App\Services\BreadCrumbsService;
use Illuminate\View\View;

class BreadcrumbsComposer
{
    public function __construct() {}

    public function compose(View $view)
    {
        $breadcrumbs = BreadCrumbsService::instance()->build($view);
        $view->with('breadcrumbs', $breadcrumbs);
    }
}
