<?php

namespace Erenav\Makers\Commands;

use Symfony\Component\Console\Input\InputArgument;

class MakeStateImplementationCommand extends MakersCommand
{
    protected $name = 'makers:state-implementation';

    protected $description = 'Create new state implementation classes';

    protected $type = 'State Implementation';

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.state-implementation.stubs.implementation'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.state-implementation.namespace');
    }

    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        return $this->replaceParentClass($stub, $this->argument('parent'));
    }

    protected function replaceParentClass(string $stub, string $parent): string
    {
        return str_replace(
            config('makers.makes.state-implementation.merges.parent', '{{parent}}'),
            $parent,
            $stub
        );
    }

    protected function getArguments(): array
    {
        return array_merge(parent::getArguments(), [
            [
                'parent',
                InputArgument::REQUIRED,
                'The name or the parent class',
            ],
        ]);
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.state-implementation.postfix');
    }
}
