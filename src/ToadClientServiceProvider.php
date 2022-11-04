<?php

namespace WebId\ToadClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use WebId\ToadClient\Commands\ToadClientCommand;

class ToadClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('toad-client')
            ->hasConfigFile()
            ->hasCommand(ToadClientCommand::class);
    }
}
