<?php

namespace Erenav\Makers\Commands;

class MakePipeCommand extends MakersCommand
{
    protected $name = 'make:pipe';

    protected $description = 'Create a new pipe class';

    protected $type = 'Pipe';

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.pipe.stubs.standard'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.pipe.namespace');
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.pipe.postfix');
    }
}
