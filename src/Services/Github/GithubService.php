<?php

namespace Octools\Client\Services\Github;

use Octools\Client\Models\Github\Issue;
use Octools\Client\Models\Github\PullRequest;
use Octools\Client\Models\Github\Repository;
use Octools\Client\Models\Github\User;
use Octools\Client\Services\AbstractApiService;

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
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            self::ENDPOINT_GET_REPOSITORIES,
            $options
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
            replaceStringParameters(self::ENDPOINT_SEARCH_REPOSITORIES, ['query' => $query]),
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
            replaceStringParameters(self::ENDPOINT_SEARCH_ISSUES, ['query' => $query]),
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
            replaceStringParameters(self::ENDPOINT_SEARCH_PR, ['query' => $query]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => PullRequest::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
