<?php

namespace App\Plugins\BillDataPlugins;

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