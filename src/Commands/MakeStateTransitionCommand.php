<?php

namespace Erenav\Makers\Commands;

use Symfony\Component\Console\Input\InputArgument;

class MakeStateTransitionCommand extends MakersCommand
{
    protected $name = 'makers:state-transition';

    protected $description = 'Create a new state transition class';

    protected $type = 'State Transition';

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.state-transition.stubs.basic'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.state-transition.namespace');
    }

    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        return $this->replaceModel($stub, $this->argument('model'));
    }

    protected function replaceModel(string $stub, string $type): string
    {
        return str_replace(
            config('makers.makes.state-transition.merges.model', '{{model}}'),
            $type,
            $stub
        );
    }

    protected function getArguments(): array
    {
        return array_merge(parent::getArguments(), [
            [
                'model',
                InputArgument::REQUIRED,
                'Generate a state transition',
            ],
        ]);
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.state-transition.postfix');
    }
}
