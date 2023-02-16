<?php

namespace WebId\OctoolsClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \WebId\OctoolsClient\OctoolsClient
 */
class OctoolsClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \WebId\OctoolsClient\OctoolsClient::class;
    }
}
