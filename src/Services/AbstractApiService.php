<?php

namespace WebId\ToadClient\Services;

use Illuminate\Support\Facades\Http;

abstract class AbstractApiService
{
    private function request(string $method, string $uri, array $body = [])
    {
        $appBasePath = 'http://toad.test/api';
        $uri = ltrim($uri, '/');

        $response = Http::send($method, "$appBasePath/$uri");

        $response->throw();

        return $response->json();
    }

    protected function get(string $uri)
    {
        return $this->request('GET', $uri);
    }

    protected function post(string $uri, array $body)
    {
        return $this->request('POST', $uri, $body);
    }
}
