<?php

namespace Erenav\Makers\Commands;

use Symfony\Component\Console\Input\InputOption;

class MakeGenericFactoryCommand extends MakersCommand
{
    protected $name = 'makers:generic-factory';

    protected $description = 'Create a new generic factory class';

    protected $type = 'Generic Factory';

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.generic-factory.stubs.generic'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.generic-factory.namespace');
    }

    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        $stub = $this->replaceImport(
            $stub,
            $this->option('import') ?? ''
        );

        return $this->replaceOutput(
            $stub,
            $this->argument('name')
        );
    }

    protected function replaceImport(string $stub, string $import): string
    {
        if(!empty($import)) {
            $import = PHP_EOL . 'use ' . $import . ';' . PHP_EOL;
        }

        return str_replace(
            config('makers.makes.generic-factory.merges.import', '{{import}}'),
            $import,
            $stub
        );
    }

    protected function replaceOutput(string $stub, string $output): string
    {
        return str_replace(
            config('makers.makes.generic-factory.merges.output', '{{output}}'),
            $output,
            $stub
        );
    }

    protected function getOptions(): array
    {
        return array_merge([
            ['import', null, InputOption::VALUE_REQUIRED, 'Include an import statement.'],
        ], parent::getOptions());
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.generic-factory.postfix');
    }
}
