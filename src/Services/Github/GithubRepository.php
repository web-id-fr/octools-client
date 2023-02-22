<?php

namespace WebId\OctoolsClient\Services\Github;

use WebId\OctoolsClient\Helpers\Str;
use WebId\OctoolsClient\Models\Github\Issue;
use WebId\OctoolsClient\Models\Github\PullRequest;
use WebId\OctoolsClient\Models\Github\Repository;
use WebId\OctoolsClient\Models\Member\Member;
use WebId\OctoolsClient\Services\AbstractApiService;

class GithubRepository extends AbstractApiService
{
    private const ENDPOINT_GET_REPOSITORY = '/github/repository/{repositoryName}';

    private const ENDPOINT_GET_REPOSITORY_ISSUES = '/github/issues/{repositoryName}';

    private const ENDPOINT_GET_REPOSITORY_PR_BY_MEMBER = '/github/pull-requests/{repositoryName}/{member}';

    private const ENDPOINT_GET_REPOSITORY_PR = '/github/pull-requests/{repositoryName}';

    public function __construct(private readonly string $repository)
    {
    }

    public function getRepository(): array
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY, ['repositoryName' => $this->repository])
        );

        return Repository::fromArray($response)->toArray();
    }

    public function getIssues(array $options = []): array
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY_ISSUES, ['repositoryName' => $this->repository]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => Issue::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function getPullRequests(array $options = []): array
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY_PR, ['repositoryName' => $this->repository]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => PullRequest::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function getPullRequestsByMember(Member $member, array $options = []): array
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY_PR_BY_MEMBER, ['repositoryName' => $this->repository, 'member' => $member->id]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => PullRequest::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
