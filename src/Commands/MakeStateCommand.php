<?php

namespace Erenav\Makers\Commands;

use Symfony\Component\Console\Input\InputArgument;

class MakeStateCommand extends MakersCommand
{
    protected $name = 'makers:state';

    protected $description = 'Create new state classes';

    protected $type = 'States';

    public function handle()
    {
        if(parent::handle() === false && !$this->option('force')) {
            return false;
        }

        $this->createImplementations();
    }

    protected function createImplementations(): void
    {
        $input = $this->getNameInput();

        $parts = explode('/', strrev($input), 2);

        $parent = strrev($parts[0]);

        $path = strrev($parts[1] ?? '');

        foreach($this->argument('implementations') as $implementation) {
            $this->call('makers:state-implementation', [
                'name' => $path . self::NAMESPACE_SEPARATOR . $implementation,
                'parent' => $parent,
            ]);
        }
    }

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.state.stubs.abstract'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.state.namespace');
    }

    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        return $this->replaceDefaultState($stub);
    }

    protected function replaceDefaultState(string $stub): string
    {
        $default = '';

        if(!empty($implementations = $this->argument('implementations'))) {
            $default = '->default(' . $implementations[0] . '::class)';
        }

        return str_replace(
            config('makers.makes.state.merges.default', '{{default}}'),
            $default,
            $stub
        );
    }

    protected function getArguments(): array
    {
        return array_merge(parent::getArguments(), [
            [
                'implementations',
                InputArgument::OPTIONAL | InputArgument::IS_ARRAY,
                'The names of the state implementations',
            ],
        ]);
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.state.postfix');
    }
}
