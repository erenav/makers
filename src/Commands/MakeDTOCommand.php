<?php

namespace Erenav\Makers\Commands;

use Symfony\Component\Console\Input\InputOption;

class MakeDTOCommand extends MakersCommand
{
    protected $name = 'make:dto';

    protected $description = 'Create a new dto class';

    protected $type = 'DTO';

    protected function getStub(): string
    {
        return $this->resolveStubPath(
            $this->option('readonly')
                ? config('makers.makes.dto.stubs.readonly')
                : config('makers.makes.dto.stubs.standard')
        );
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.dto.namespace');
    }

    protected function getOptions(): array
    {
        return array_merge([
            ['readonly', null, InputOption::VALUE_NONE, 'Generate a readonly dto class'],
        ], parent::getOptions());
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.dto.postfix');
    }
}
