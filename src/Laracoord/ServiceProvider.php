<?php

namespace Laracoord;

use Exception;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider {
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    /**
     * Register the service provider.
     *
     * @throws \Exception
     * @return void
     */
    public function register()
    {
    }
    public function boot()
    {
        $this->app->bind('laracoord', function ($app) {
            return new Laracoord();
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('laracoord');
    }
    /**
     * Define a value, if not already defined
     *
     * @param string $name
     * @param string $value
     */
    protected function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }
}
