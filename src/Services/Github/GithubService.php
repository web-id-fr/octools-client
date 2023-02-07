<?php

namespace WebId\ToadClient\Services\Github;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Models\Github\Issue;
use WebId\ToadClient\Models\Github\PullRequest;
use WebId\ToadClient\Models\Github\Repository;
use WebId\ToadClient\Models\Github\User;
use WebId\ToadClient\Services\AbstractApiService;

class GithubService extends AbstractApiService
{
    private const ENDPOINT_GET_REPOSITORIES = '/github/company-repositories';

    private const ENDPOINT_GET_EMPLOYEES = '/github/company-employees';

    private const ENDPOINT_SEARCH_REPOSITORIES = '/github/search-repositories/{query}';

    private const ENDPOINT_SEARCH_ISSUES = '/github/search-issues/{query}';

    private const ENDPOINT_SEARCH_PR = '/github/search-pull-requests/{query}';

    ////////////////
    /// REPOSITORY
    ///////////////

    public function repository(string $repository): GithubRepository
    {
        return new GithubRepository($repository);
    }

    ////////////////
    /// ORGANIZATION
    ///////////////

    public function getCompanyRepositories(): array
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            self::ENDPOINT_GET_REPOSITORIES
        );

        $response['items'] = array_map(
            fn (array $item) => Repository::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function getCompanyEmployees(): array
    {
        /** @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            self::ENDPOINT_GET_EMPLOYEES
        );

        $response['items'] = array_map(
            fn (array $item) => User::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function searchRepositories(string $query): array
    {
        /** @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_SEARCH_REPOSITORIES, ['query' => $query])
        );

        $response['items'] = array_map(
            fn (array $item) => Repository::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function searchIssues(string $query): array
    {
        /** @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_SEARCH_ISSUES, ['query' => $query])
        );

        $response['items'] = array_map(
            fn (array $item) => Issue::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function searchPullRequests(string $query): array
    {
        /** @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_SEARCH_PR, ['query' => $query])
        );

        $response['items'] = array_map(
            fn (array $item) => PullRequest::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
