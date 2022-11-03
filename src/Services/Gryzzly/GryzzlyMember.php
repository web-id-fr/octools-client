<?php

namespace WebId\ToadClient\Services\Gryzzly;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Services\AbstractApiService;

class GryzzlyMember extends AbstractApiService
{
    private const ENDPOINT_GET_EMPLOYEE = '/gryzzly/company-employee/{member}';

    private const ENDPOINT_GET_EMPLOYEE_DECLARATIONS = '/gryzzly/{member}/declarations';

    /**
     * @param  array  $member
     */
    public function __construct(private readonly array $member)
    {
    }

    public function getEmployeeById(): array
    {
        return $this->get(
            Str::buildStringWithParameters(self::ENDPOINT_GET_EMPLOYEE, ['member' => $this->member['id']])
        );
    }

    public function getEmployeeDeclarations(): array
    {
        return $this->get(
            Str::buildStringWithParameters(self::ENDPOINT_GET_EMPLOYEE_DECLARATIONS, ['member' => $this->member['id']])
        );
    }
}
