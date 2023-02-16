<?php

namespace WebId\OctoolsClient;

use WebId\OctoolsClient\Helpers\Str;
use WebId\OctoolsClient\Models\Member\Member;
use WebId\OctoolsClient\Services\AbstractApiService;
use WebId\OctoolsClient\Services\Github\GithubService;
use WebId\OctoolsClient\Services\Gryzzly\GryzzlyService;
use WebId\OctoolsClient\Services\Slack\SlackService;

class OctoolsClient extends AbstractApiService
{
    private const ENDPOINT_GET_MEMBERS = '/members';

    private const ENDPOINT_GET_MEMBER_BY_ID = '/members/{member}';

    private const ENDPOINT_GET_MEMBER_BY_EMAIL = '/members/{email}';

    public function __construct(
        public readonly GithubService $github = new GithubService(),
        public readonly SlackService $slack = new SlackService(),
        public readonly GryzzlyService $gryzzly = new GryzzlyService(),
    ) {
    }

    public function getMembers(): array
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        return $this->get(
            $apiToken,
            self::ENDPOINT_GET_MEMBERS
        );
    }

    public function getMemberById(int $id): Member
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_MEMBER_BY_ID, ['member' => $id])
        );

        return Member::fromArray($response);
    }

    public function getMemberByEmail(string $email): Member
    {
        /* @var string $apiToken */
        $apiToken = config('octools-client.application_token');

        $response = $this->get(
            $apiToken,
            Str::buildStringWithParameters(self::ENDPOINT_GET_MEMBER_BY_EMAIL, ['email' => $email])
        );

        return Member::fromArray($response);
    }
}
