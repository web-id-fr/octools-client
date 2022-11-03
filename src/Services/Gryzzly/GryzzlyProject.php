<?php

namespace WebId\ToadClient\Services\Gryzzly;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Services\AbstractApiService;

class GryzzlyProject extends AbstractApiService
{
    private const ENDPOINT_GET_TASKS_OF_PROJECT = '/gryzzly/{project}/tasks';

    /**
     * @param  string  $project
     */
    public function __construct(private readonly string $project)
    {
    }

    public function getTasksOfProject(): array
    {
        return $this->get(
            Str::buildStringWithParameters(self::ENDPOINT_GET_TASKS_OF_PROJECT, ['project' => $this->project])
        );
    }
}
