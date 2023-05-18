<?php

namespace Erenav\Makers;

use Erenav\Makers\Commands\MakeActionCommand;
use Erenav\Makers\Commands\MakeDTOCommand;
use Erenav\Makers\Commands\MakeEnumCommand;
use Erenav\Makers\Commands\MakeGenericFactoryCommand;
use Erenav\Makers\Commands\MakeMacrosCommand;
use Erenav\Makers\Commands\MakePipeCommand;
use Erenav\Makers\Commands\MakeStateCommand;
use Erenav\Makers\Commands\MakeStateImplementationCommand;
use Erenav\Makers\Commands\MakeStateTransitionCommand;
use Erenav\Makers\Commands\PublishStubsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MakersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('makers')
                ->hasCommand(MakeActionCommand::class)
                ->hasCommand(MakeDTOCommand::class)
                ->hasCommand(MakeEnumCommand::class)
                ->hasCommand(MakeGenericFactoryCommand::class)
                ->hasCommand(MakeMacrosCommand::class)
                ->hasCommand(MakePipeCommand::class)
                ->hasCommand(MakeStateCommand::class)
                ->hasCommand(MakeStateImplementationCommand::class)
                ->hasCommand(MakeStateTransitionCommand::class)
                ->hasCommand(PublishStubsCommand::class)
                ->hasConfigFile();
    }
}
