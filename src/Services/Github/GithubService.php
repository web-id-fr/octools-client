<?php

namespace WebId\ToadClient\Services\Github;

use WebId\ToadClient\Services\AbstractApiService;

class GithubService extends AbstractApiService
{
    private const ENDPOINT_GET_REPOSITORIES = '/github/company-repositories';

    private const ENDPOINT_GET_ALL_PULL_REQUESTS = '/github/company-pull-requests';

    private const ENDPOINT_GET_EMPLOYEES = '/github/company-employees';

    ////////////////
    /// MEMBER OR REPOSITORY
    ///////////////

    public function member(array $member): GithubMember
    {
        return new GithubMember($member);
    }

    public function repository(string $repository): GithubRepository
    {
        return new GithubRepository($repository);
    }

    ////////////////
    /// ORGANIZATION
    ///////////////

    public function getCompanyRepositories(): array
    {
        return $this->get(self::ENDPOINT_GET_REPOSITORIES);
    }

    public function getCompanyPullRequests(): array
    {
        return $this->get(self::ENDPOINT_GET_ALL_PULL_REQUESTS);
    }

    public function getCompanyEmployees(): array
    {
        return $this->get(self::ENDPOINT_GET_EMPLOYEES);
    }
}
