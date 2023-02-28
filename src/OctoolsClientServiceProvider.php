<?php

namespace Octools\Client;

use Illuminate\Support\ServiceProvider;

class OctoolsClientServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/octools-client.php' => config_path('octools-client.php'),
            ], 'config');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/octools-client.php', 'octools-client');
    }
}
