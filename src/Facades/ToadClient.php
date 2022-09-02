<?php

namespace WebId\ToadClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \WebId\ToadClient\ToadClient
 */
class ToadClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \WebId\ToadClient\ToadClient::class;
    }
}
