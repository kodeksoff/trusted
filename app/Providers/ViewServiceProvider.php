<?php

namespace App\Providers;

use App\Http\View\Composers\BreadcrumbsComposer;
use App\Http\View\Composers\MetaComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.layout', MetaComposer::class);
        View::composer('components.breadcrumbs', BreadcrumbsComposer::class);
    }
}
