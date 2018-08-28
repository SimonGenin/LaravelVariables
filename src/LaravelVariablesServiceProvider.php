<?php

namespace SimonGenin\LaravelVariables;

use Illuminate\Support\ServiceProvider;

class LaravelVariablesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'simongenin');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'simongenin');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__ . '/../config/variables.php' => config_path('variables.php'),
            ], 'variables.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/simongenin'),
            ], 'laravelvariables.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/simongenin'),
            ], 'laravelvariables.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/simongenin'),
            ], 'laravelvariables.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/variables.php', 'variables');

        // Register the service the package provides.
        $this->app->singleton('variables', function ($app) {
            return new LaravelVariables;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelvariables'];
    }
}
