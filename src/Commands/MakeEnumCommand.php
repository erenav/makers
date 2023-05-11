<?php

namespace Erenav\Makers\Commands;

use Symfony\Component\Console\Input\InputOption;

class MakeEnumCommand extends MakersCommand
{
    protected $name = 'makers:enum';

    protected $description = 'Create a new enum class';

    protected $type = 'Enum';

    protected function getStub(): string
    {
        return $this->resolveStubPath(
            $this->option('backed')
                ? config('makers.makes.enum.stubs.backed')
                : config('makers.makes.enum.stubs.basic')
        );
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.enum.namespace');
    }

    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        if($this->option('backed')) {
            $stub = $this->replaceBackedType($stub, $this->option('backed'));
        }

        return $stub;
    }

    protected function replaceBackedType(string $stub, string $type): string
    {
        return str_replace(
            config('makers.makes.enum.merges.type', '{{type}}'),
            $type,
            $stub
        );
    }

    protected function getOptions(): array
    {
        return array_merge([
            ['backed', null, InputOption::VALUE_REQUIRED, 'Generate a backed enum.'],
        ], parent::getOptions());
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.enum.postfix');
    }
}
