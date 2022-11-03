<?php

namespace WebId\ToadClient\Services\Github;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Services\AbstractApiService;

class GithubRepository extends AbstractApiService
{
    private const ENDPOINT_GET_REPOSITORY_BY_NAME = '/github/repository/{repositoryName}';

    private const ENDPOINT_GET_REPOSITORY_ISSUES = '/github/issues/{repositoryName}';

    /**
     * @param  string  $repository
     */
    public function __construct(private readonly string $repository)
    {
    }

    public function getRepositoryByName(): array
    {
        return $this->get(
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY_BY_NAME, ['repositoryName' => $this->repository])
        );
    }

    public function getRepositoryIssues(): array
    {
        return $this->get(
            Str::buildStringWithParameters(self::ENDPOINT_GET_REPOSITORY_ISSUES, ['repositoryName' => $this->repository])
        );
    }
}
