<?php

namespace Erenav\Makers;

use Erenav\Makers\Commands\MakeActionCommand;
use Erenav\Makers\Commands\MakeDTOCommand;
use Erenav\Makers\Commands\MakeEnumCommand;
use Erenav\Makers\Commands\MakeMacrosCommand;
use Erenav\Makers\Commands\MakeMixinCommand;
use Erenav\Makers\Commands\MakePipeCommand;
use Erenav\Makers\Commands\MakeStatesCommand;
use Erenav\Makers\Commands\MakeStateCommand;
use Erenav\Makers\Commands\MakeValueObjectCommand;
use Erenav\Makers\Commands\PublishStubsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MakersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('makers')
                ->hasConfigFile()
                ->hasCommands([
                    MakeActionCommand::class,
                    MakeDTOCommand::class,
                    MakeEnumCommand::class,
                    MakeMacrosCommand::class,
                    MakeMixinCommand::class,
                    MakePipeCommand::class,
                    MakeStatesCommand::class,
                    MakeStateCommand::class,
                    MakeValueObjectCommand::class,
                    PublishStubsCommand::class,
                ]);
    }
}
