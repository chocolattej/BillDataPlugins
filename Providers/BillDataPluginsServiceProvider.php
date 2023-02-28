<?php

namespace App\Plugins\BillDataPlugins\Providers;

use Illuminate\Support\ServiceProvider;

class BillDataPluginsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'BillDataPlugins');
    }

}