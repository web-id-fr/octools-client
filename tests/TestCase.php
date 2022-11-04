<?php

namespace WebId\ToadClient\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use WebId\ToadClient\ToadClientServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ToadClientServiceProvider::class,
        ];
    }
}
