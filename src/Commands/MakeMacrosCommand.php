<?php

namespace Erenav\Makers\Commands;

class MakeMacrosCommand extends MakersCommand
{
    protected $name = 'make:macros';

    protected $description = 'Create a new class for macros';

    protected $type = 'Macros';

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.macros.stubs.standard'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.macros.namespace');
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.macros.postfix');
    }
}
