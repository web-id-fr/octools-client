<?php

namespace WebId\OctoolsClient\Services\Gryzzly;

use WebId\OctoolsClient\Models\Gryzzly\Project;
use WebId\OctoolsClient\Models\Gryzzly\User;
use WebId\OctoolsClient\Models\Member\Member;
use WebId\OctoolsClient\Services\AbstractApiService;

class GryzzlyService extends AbstractApiService
{
    private const ENDPOINT_GET_EMPLOYEES = '/gryzzly/company-employees';

    private const ENDPOINT_GET_PROJECTS = '/gryzzly/company-projects';

    ////////////////
    /// MEMBER OR PROJECT
    ///////////////

    public function member(Member $member): GryzzlyMember
    {
        return new GryzzlyMember($member);
    }

    public function project(string $project): GryzzlyProject
    {
        return new GryzzlyProject($project);
    }

    ////////////////
    /// ORGANIZATION
    ///////////////

    public function getCompanyEmployees(array $options = []): array
    {
        /* @var string $apiToken */
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

    public function getCompanyProjects(array $options = []): array
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            self::ENDPOINT_GET_PROJECTS,
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => Project::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
