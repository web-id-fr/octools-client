<?php

namespace Octools\Client\Services\Gryzzly;

use Octools\Client\Models\Gryzzly\Declaration;
use Octools\Client\Models\Gryzzly\User;
use Octools\Client\Models\Member\Member;
use Octools\Client\Services\AbstractApiService;

class GryzzlyMember extends AbstractApiService
{
    private const ENDPOINT_GET_EMPLOYEE = '/gryzzly/company-employee/{member}';

    private const ENDPOINT_GET_EMPLOYEE_DECLARATIONS = '/gryzzly/{member}/declarations';

    public function __construct(private readonly Member $member)
    {
    }

    public function getEmployee(): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            replaceStringParameters(self::ENDPOINT_GET_EMPLOYEE, ['member' => $this->member->id])
        );

        return User::fromArray($response)->toArray();
    }

    public function getDeclarations(array $options = []): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            replaceStringParameters(self::ENDPOINT_GET_EMPLOYEE_DECLARATIONS, ['member' => $this->member->id]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => Declaration::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
