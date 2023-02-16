<?php

namespace WebId\OctoolsClient\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractApiService
{
    private function auth(string $apiToken): PendingRequest
    {
        $appBasePath = 'http://toad.test/api';

        return Http::withToken($apiToken)
            ->throw()
            ->asJson()
            ->acceptJson()
            ->baseUrl($appBasePath);
    }

    protected function get(string $apiToken, string $uri, array $body = []): array
    {
        return $this->auth($apiToken)->get($uri, $body)->json();
    }

    protected function post(string $apiToken, string $uri, array $body = []): array
    {
        return $this->auth($apiToken)->post($uri, $body)->json();
    }
}
