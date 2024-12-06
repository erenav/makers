<?php

namespace Erenav\Makers\Commands;

class MakeMixinCommand extends MakersCommand
{
    protected $name = 'make:mixin';

    protected $description = 'Create a new class for a mixin';

    protected $type = 'Mixins';

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.mixin.stubs.standard'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.mixin.namespace');
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.mixin.postfix');
    }
}
