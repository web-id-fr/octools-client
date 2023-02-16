<?php

namespace WebId\OctoolsClient\Services\Github;

use WebId\OctoolsClient\Helpers\Str;
use WebId\OctoolsClient\Models\Github\Issue;
use WebId\OctoolsClient\Models\Github\PullRequest;
use WebId\OctoolsClient\Models\Github\Repository;
use WebId\OctoolsClient\Models\Github\User;
use WebId\OctoolsClient\Services\AbstractApiService;

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

    public function getCompanyRepositories(array $options = []): array
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

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

    public function getCompanyEmployees(array $options = []): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            self::ENDPOINT_GET_EMPLOYEES,
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => User::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function searchRepositories(string $query, array $options = []): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_SEARCH_REPOSITORIES, ['query' => $query]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => Repository::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function searchIssues(string $query, array $options = []): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_SEARCH_ISSUES, ['query' => $query]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => Issue::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function searchPullRequests(string $query, array $options = []): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_SEARCH_PR, ['query' => $query]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => PullRequest::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
