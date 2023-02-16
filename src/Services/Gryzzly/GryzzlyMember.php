<?php

namespace WebId\OctoolsClient\Services\Gryzzly;

use WebId\OctoolsClient\Helpers\Str;
use WebId\OctoolsClient\Models\Gryzzly\Declaration;
use WebId\OctoolsClient\Models\Gryzzly\User;
use WebId\OctoolsClient\Models\Member\Member;
use WebId\OctoolsClient\Services\AbstractApiService;

class GryzzlyMember extends AbstractApiService
{
    private const ENDPOINT_GET_EMPLOYEE = '/gryzzly/company-employee/{member}';

    private const ENDPOINT_GET_EMPLOYEE_DECLARATIONS = '/gryzzly/{member}/declarations';

    /**
     * @param  Member  $member
     */
    public function __construct(private readonly Member $member)
    {
    }

    public function getEmployee(): User
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_EMPLOYEE, ['member' => $this->member->id])
        );

        return User::fromArray($response);
    }

    public function getDeclarations(array $options = []): array
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_EMPLOYEE_DECLARATIONS, ['member' => $this->member->id]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => Declaration::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
