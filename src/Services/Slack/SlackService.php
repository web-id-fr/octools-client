<?php

namespace WebId\ToadClient\Services\Slack;

use WebId\ToadClient\Services\AbstractApiService;

class SlackService extends AbstractApiService
{
    private const ENDPOINT_GET_EMPLOYEES = '/slack/company-employees';

    private const ENDPOINT_SEND_MESSAGE_IN_CHANNEL = '/slack/send-message-to-channel';

    ////////////////
    /// ORGANIZATION
    ///////////////

    public function getCompanyEmployees(): array
    {
        return $this->get(self::ENDPOINT_GET_EMPLOYEES);
    }

    public function sendMessageToChannel(string $message, string $channel)
    {
        return $this->post(self::ENDPOINT_SEND_MESSAGE_IN_CHANNEL,
            [
                'channel' => $channel,
                'message' => $message,
            ]
        );
    }
}
