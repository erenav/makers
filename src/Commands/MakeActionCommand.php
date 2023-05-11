<?php

namespace Erenav\Makers\Commands;

class MakeActionCommand extends MakersCommand
{
    protected $name = 'makers:action';

    protected $description = 'Create a new action class';

    protected $type = 'Action';

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.action.stubs.generic'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.action.namespace');
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.action.postfix');
    }
}
