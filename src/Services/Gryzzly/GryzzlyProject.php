<?php

namespace WebId\ToadClient\Services\Gryzzly;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Models\Gryzzly\Task;
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

    public function getTasksOfProject(array $options = []): array
    {
        /** @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_TASKS_OF_PROJECT, ['project' => $this->project]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => Task::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
