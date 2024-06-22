<?php

namespace Erenav\Makers\Commands;

use Symfony\Component\Console\Input\InputArgument;

class MakeStatesCommand extends MakersCommand
{
    protected $name = 'make:states';

    protected $description = 'Create new state classes';

    protected $type = 'States';

    public function handle()
    {
        if (parent::handle() === false && !$this->option('force')) {
            return false;
        }

        $this->createImplementations();
    }

    protected function getNameInput(): string
    {
        $input = parent::getNameInput();

        $parts = explode('/', strrev($input), 2);

        $base = strrev($parts[0]);

        return $input.'/'.$base;
    }

    protected function createImplementations(): void
    {
        foreach ($this->argument('states') as $name) {
            $this->call('make:state', [
                'name' => $name,
                'base' => parent::getNameInput(),
            ]);
        }
    }

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.states.stubs.standard'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.self::NAMESPACE_SEPARATOR.config('makers.makes.states.namespace');
    }

    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        return $this->replaceDefaultState($stub);
    }

    protected function replaceDefaultState(string $stub): string
    {
        $default = '';

        if (!empty($states = $this->argument('states'))) {
            $default = '->default('.$states[0].'::class)';
        }

        return str_replace(
            config('makers.makes.states.merges.default', '{{default}}'),
            $default,
            $stub
        );
    }

    protected function getArguments(): array
    {
        return array_merge(parent::getArguments(), [
            ['states', InputArgument::OPTIONAL | InputArgument::IS_ARRAY, 'The state implementations',],
        ]);
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.states.postfix');
    }
}
