<?php

namespace WebId\OctoolsClient\Commands;

use Illuminate\Console\Command;
use WebId\OctoolsClient\OctoolsClient;

class OctoolsClientCommand extends Command
{
    public $signature = 'octools-client';

    public $description = 'My command';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        return self::SUCCESS;
    }
}
