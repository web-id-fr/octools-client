<?php

namespace WebId\ToadClient\Services\Gryzzly;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Models\Gryzzly\Declaration;
use WebId\ToadClient\Models\Gryzzly\User;
use WebId\ToadClient\Models\Member\Member;
use WebId\ToadClient\Services\AbstractApiService;

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
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_EMPLOYEE, ['member' => $this->member->id])
        );

        return User::fromArray($response);
    }

    public function getDeclarations(): array
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_EMPLOYEE_DECLARATIONS, ['member' => $this->member->id])
        );

        $response['items'] = array_map(
            fn (array $item) => Declaration::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
