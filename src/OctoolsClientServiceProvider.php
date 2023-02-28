<?php

namespace Octools\Client;

use Illuminate\Support\ServiceProvider;

class OctoolsClientServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/octools-client.php', 'octools-client');
    }
}
