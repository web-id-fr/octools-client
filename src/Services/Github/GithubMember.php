<?php

namespace WebId\ToadClient\Services\Github;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Services\AbstractApiService;

class GithubMember extends AbstractApiService
{
    private const ENDPOINT_GET_EMPLOYEE_PR = '/github/{member}/pull-requests';

    /**
     * @param  array  $member
     */
    public function __construct(private readonly array $member)
    {
    }

    public function getPullRequests(): array
    {
        return $this->get(
            Str::buildStringWithParameters(self::ENDPOINT_GET_EMPLOYEE_PR, ['member' => $this->member['id']])
        );
    }
}
