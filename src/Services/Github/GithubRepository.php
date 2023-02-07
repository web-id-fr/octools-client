<?php

namespace WebId\ToadClient\Services\Github;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Models\Github\Issue;
use WebId\ToadClient\Models\Github\PullRequest;
use WebId\ToadClient\Models\Github\Repository;
use WebId\ToadClient\Models\Member\Member;
use WebId\ToadClient\Services\AbstractApiService;

class GithubRepository extends AbstractApiService
{
    private const ENDPOINT_GET_REPOSITORY = '/github/repository/{repositoryName}';

    private const ENDPOINT_GET_REPOSITORY_ISSUES = '/github/issues/{repositoryName}';

    private const ENDPOINT_GET_REPOSITORY_PR_BY_MEMBER = '/github/pull-requests/{repositoryName}/{member}';

    private const ENDPOINT_GET_REPOSITORY_PR = '/github/pull-requests/{repositoryName}';

    /**
     * @param  string  $repository
     */
    public function __construct(private readonly string $repository)
    {
    }

    public function getRepository(): Repository
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY, ['repositoryName' => $this->repository])
        );

        return Repository::fromArray($response);
    }

    public function getIssues(): array
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY_ISSUES, ['repositoryName' => $this->repository])
        );

        $response['items'] = array_map(
            fn (array $item) => Issue::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function getPullRequests(): array
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY_PR, ['repositoryName' => $this->repository])
        );

        $response['items'] = array_map(
            fn (array $item) => PullRequest::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function getPullRequestsByMember(Member $member): array
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY_PR_BY_MEMBER, ['repositoryName' => $this->repository, 'member' => $member->id])
        );

        $response['items'] = array_map(
            fn (array $item) => PullRequest::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
