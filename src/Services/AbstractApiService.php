<?php

namespace WebId\ToadClient\Services;

use Illuminate\Support\Facades\Http;

abstract class AbstractApiService
{
    /**
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $body
     * @return array
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    private function request(string $method, string $uri, array $body = []): array
    {
        $appBasePath = 'http://toad.test/api';
        $uri = ltrim($uri, '/');

        /** @var array $response */
        $response = Http::send($method, "$appBasePath/$uri")->throw()->json();

        return $response;
    }

    protected function get(string $uri): array
    {
        return $this->request('GET', $uri);
    }

    protected function post(string $uri, array $body): array
    {
        return $this->request('POST', $uri, $body);
    }
}
