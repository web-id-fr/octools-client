<?php

namespace WebId\ToadClient;

use WebId\ToadClient\Services\Github\GithubService;

class ToadClient
{
    public function __construct(public readonly GithubService $github)
    {
    }
}
