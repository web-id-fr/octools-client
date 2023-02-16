<?php

namespace WebId\OctoolsClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use WebId\OctoolsClient\Commands\OctoolsClientCommand;

class OctoolsClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('octools-client')
            ->hasConfigFile()
            ->hasCommand(OctoolsClientCommand::class);
    }
}
