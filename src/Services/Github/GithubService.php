<?php

namespace WebId\ToadClient\Services\Github;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Services\AbstractApiService;

class GithubService extends AbstractApiService
{
    private const ENDPOINT_GET_REPOSITORIES = '/github/getrepositories';
    private const ENDPOINT_GET_EMPLOYEE_PR = '/github/{firstname}/pullRequests';

    public function user(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRepositories(string $user)
    {
        return $this->get(self::ENDPOINT_GET_REPOSITORIES);
    }

    public function test()
    {
        return $this->get(
            Str::buildStringWithParameters(self::ENDPOINT_GET_EMPLOYEE_PR, ['firstname' => 'Clément'])
        );
    }
}
