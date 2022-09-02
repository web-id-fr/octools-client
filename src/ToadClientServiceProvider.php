<?php

namespace WebId\ToadClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use WebId\ToadClient\Commands\ToadClientCommand;

class ToadClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('toad-client')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_toad-client_table')
            ->hasCommand(ToadClientCommand::class);
    }
}
