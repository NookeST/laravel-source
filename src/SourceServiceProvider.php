<?php

namespace Nookest\Source;

class SourceServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/source.php' => config_path('source.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/source.php', 'source');

        $this->app->when(SourceManager::class)
            ->needs('$sessionKey')
            ->give(function () {
                return $this->app['config']->get('source.session_key');
            });

        $this->app->when(SourceManager::class)
            ->needs('$sources')
            ->give(function () {
                return $this->app['config']->get('source.sources', []);
            });

        $this->app->singleton(SourceManager::class);
        $this->app->alias(SourceManager::class, 'source');
    }
}
