<?php

namespace WebId\ToadClient;

use WebId\ToadClient\Helpers\Str;
use WebId\ToadClient\Services\AbstractApiService;
use WebId\ToadClient\Services\Github\GithubService;
use WebId\ToadClient\Services\Gryzzly\GryzzlyService;
use WebId\ToadClient\Services\Slack\SlackService;

class ToadClient extends AbstractApiService
{
    private const ENDPOINT_GET_MEMBERS = '/members';

    private const ENDPOINT_GET_MEMBER_BY_ID = '/members/{member}';

    private const ENDPOINT_GET_MEMBER_BY_EMAIL = '/member/{email}';

    public function __construct(
        public readonly GithubService $github,
        public readonly SlackService $slack,
        public readonly GryzzlyService $gryzzly,
    ) {
    }

    public function getMembers(): array
    {
        return $this->get(self::ENDPOINT_GET_MEMBERS);
    }

    public function getMemberById(int $id): array
    {
        return $this->get(
            Str::buildStringWithParameters(self::ENDPOINT_GET_MEMBER_BY_ID, ['member' => $id]));
    }

    public function getMemberByEmail(string $email): array
    {
        return $this->get(
            Str::buildStringWithParameters(self::ENDPOINT_GET_MEMBER_BY_EMAIL, ['email' => $email]));
    }
}
