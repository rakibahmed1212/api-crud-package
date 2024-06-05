<?php

namespace Rakibahmed\ApiCrudPackage;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class ApiCrudPackageServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            ApiCrudPackageCommand::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
    }
}
