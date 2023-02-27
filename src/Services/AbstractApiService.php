<?php

namespace Octools\Client\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractApiService
{
    private function auth(string $apiToken): PendingRequest
    {
        $appBasePath = 'https://octools.web-id.ninja/api';

        return Http::withToken($apiToken)
            ->throw()
            ->asJson()
            ->acceptJson()
            ->baseUrl($appBasePath);
    }

    protected function get(string $apiToken, string $uri, array $body = []): array
    {
        /** @var array $response */
        $response = $this->auth($apiToken)->get($uri, $body)->json();

        return $response;
    }

    protected function post(string $apiToken, string $uri, array $body = []): array
    {
        /** @var array $response */
        $response = $this->auth($apiToken)->post($uri, $body)->json();

        return $response;
    }
}
