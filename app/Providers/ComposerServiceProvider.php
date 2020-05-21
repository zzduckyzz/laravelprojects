<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['frontend.templates.inc_header'] , 'App\Http\ViewCompoers\CategoryComposer');
        View::composer(['frontend.templates.inc_sidebar_right'] , 'App\Http\ViewCompoers\WorldNewsComposer');
        View::composer(['frontend.templates.inc_news_hot'] , 'App\Http\ViewCompoers\HotComposer');
    }

}
