<?php

namespace WebId\ToadClient;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Models\Member\Member;
use WebId\ToadClient\Services\AbstractApiService;
use WebId\ToadClient\Services\Github\GithubService;
use WebId\ToadClient\Services\Gryzzly\GryzzlyService;
use WebId\ToadClient\Services\Slack\SlackService;

class ToadClient extends AbstractApiService
{
    private const ENDPOINT_GET_MEMBERS = '/members';

    private const ENDPOINT_GET_MEMBER_BY_ID = '/members/{member}';

    private const ENDPOINT_GET_MEMBER_BY_EMAIL = '/members/{email}';

    public function __construct(
        public readonly GithubService $github,
        public readonly SlackService $slack,
        public readonly GryzzlyService $gryzzly,
    ) {
    }

    public function getMembers(): array
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        return $this->get(
            $apiToken,
            self::ENDPOINT_GET_MEMBERS
        );
    }

    public function getMemberById(int $id): Member
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_MEMBER_BY_ID, ['member' => $id])
        );

        return Member::fromArray($response);
    }

    public function getMemberByEmail(string $email): Member
    {
        /* @var string $apiToken */
        $apiToken = config('toad-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_MEMBER_BY_EMAIL, ['email' => $email])
        );

        return Member::fromArray($response);
    }
}
