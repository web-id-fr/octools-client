<?php

namespace WebId\OctoolsClient\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use WebId\OctoolsClient\OctoolsClientServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            OctoolsClientServiceProvider::class,
        ];
    }
}
