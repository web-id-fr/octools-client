<?php

namespace Octools\Client\Services\Slack;

use Octools\Client\Models\Slack\Message;
use Octools\Client\Models\Slack\User;
use Octools\Client\Services\AbstractApiService;

class SlackService extends AbstractApiService
{
    private const ENDPOINT_GET_EMPLOYEES = '/slack/company-employees';

    private const ENDPOINT_SEND_MESSAGE_IN_CHANNEL = '/slack/send-message-to-channel';

    private const ENDPOINT_SEARCH_MESSAGES = '/slack/search-messages/{query}';

    ////////////////
    /// ORGANIZATION
    ///////////////

    public function getCompanyEmployees(array $options = []): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            self::ENDPOINT_GET_EMPLOYEES,
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => User::fromArray($item),
            $response['items']
        );

        return $response;
    }

    public function sendMessageToChannel(string $message, string $channel): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        return $this->post(
            $apiToken,
            self::ENDPOINT_SEND_MESSAGE_IN_CHANNEL,
            [
                'channel' => $channel,
                'message' => $message,
            ]
        );
    }

    public function searchMessages(string $query, array $options = []): array
    {
        /** @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            replaceStringParameters(self::ENDPOINT_SEARCH_MESSAGES, ['query' => $query]),
            $options
        );

        $response['items'] = array_map(
            fn (array $item) => Message::fromArray($item),
            $response['items']
        );

        return $response;
    }
}
