<?php

namespace Erenav\Makers\Commands;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

class MakeStateCommand extends MakersCommand
{
    protected $name = 'make:state';

    protected $description = 'Create a new state class';

    protected $type = 'State';

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.state.stubs.standard'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $base = Str::replace('/', self::NAMESPACE_SEPARATOR, $this->argument('base'));

        return $rootNamespace.self::NAMESPACE_SEPARATOR.config('makers.makes.state.namespace').self::NAMESPACE_SEPARATOR.$base;
    }

    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        return $this->replaceParentClass($stub, $this->argument('base'));
    }

    protected function replaceParentClass(string $stub, string $parent): string
    {
        $parts = explode('/', strrev($parent), 2);

        $parent = strrev($parts[0]);

        return str_replace(
            config('makers.makes.state.merges.base', '{{base}}'),
            $parent,
            $stub
        );
    }

    protected function getArguments(): array
    {
        return array_merge(parent::getArguments(), [
            [
                'base',
                InputArgument::REQUIRED,
                'The name of the base state class',
            ],
        ]);
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.state.postfix');
    }
}
