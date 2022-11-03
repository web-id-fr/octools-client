<?php

namespace WebId\ToadClient\Commands;

use Illuminate\Console\Command;
use WebId\ToadClient\ToadClient;

class ToadClientCommand extends Command
{
    public $signature = 'toad-client';

    public $description = 'My command';

    public function __construct(private readonly ToadClient $client)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $member = $this->client->getMemberByEmail('clement@web-id.fr');
        $this->client->gryzzly->member($member)->getEmployeeDeclarations();

        return self::SUCCESS;
    }
}
