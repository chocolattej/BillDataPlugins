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

    public function map()
    {
        $this->mapRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

}