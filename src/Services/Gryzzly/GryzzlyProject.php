<?php

namespace WebId\OctoolsClient\Services\Gryzzly;

use WebId\OctoolsClient\Helpers\Str;
use WebId\OctoolsClient\Models\Gryzzly\Task;
use WebId\OctoolsClient\Services\AbstractApiService;

class GryzzlyProject extends AbstractApiService
{
    private const ENDPOINT_GET_TASKS_OF_PROJECT = '/gryzzly/{project}/tasks';

    public function __construct(private readonly string $project)
    {
    }

    public function getTasksOfProject(array $options = []): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

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
