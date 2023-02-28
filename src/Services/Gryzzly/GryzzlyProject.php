<?php

namespace Octools\Client\Services\Gryzzly;

use Octools\Client\Models\Gryzzly\Task;
use Octools\Client\Services\AbstractApiService;

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
            replaceStringParameters(self::ENDPOINT_GET_TASKS_OF_PROJECT, ['project' => $this->project]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => Task::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
