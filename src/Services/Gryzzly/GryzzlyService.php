<?php

namespace WebId\ToadClient\Services\Gryzzly;

use WebId\ToadClient\Models\Gryzzly\Project;
use WebId\ToadClient\Models\Gryzzly\User;
use WebId\ToadClient\Models\Member\Member;
use WebId\ToadClient\Services\AbstractApiService;

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

    public function getCompanyEmployees(): array
    {
        /* @var string $apiToken */
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

    public function getCompanyProjects(): array
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            self::ENDPOINT_GET_PROJECTS
        );

        $response['items'] = array_map(
            fn (array $item) => Project::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
