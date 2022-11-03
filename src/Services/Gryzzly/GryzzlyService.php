<?php

namespace WebId\ToadClient\Services\Gryzzly;

use WebId\ToadClient\Services\AbstractApiService;

class GryzzlyService extends AbstractApiService
{
    private const ENDPOINT_GET_EMPLOYEES = '/gryzzly/company-employees';

    private const ENDPOINT_GET_PROJECTS = '/gryzzly/company-projects';

    ////////////////
    /// MEMBER OR PROJECT
    ///////////////

    public function member(array $member): GryzzlyMember
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
        return $this->get(self::ENDPOINT_GET_EMPLOYEES);
    }

    public function getCompanyProjects(): array
    {
        return $this->get(self::ENDPOINT_GET_PROJECTS);
    }
}
