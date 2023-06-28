<?php

namespace Erenav\Makers\Commands;

use Symfony\Component\Console\Input\InputOption;

/**
 * Class MakeValueObjectCommand
 *
 * @package Erenav\Makers\Commands
 */
class MakeValueObjectCommand extends MakersCommand
{
    protected $name = 'makers:value-object';

    protected $description = 'Create a new value object class';

    protected $type = 'Value Object';

    public function handle()
    {
        if (parent::handle() === false && !$this->option('force')) {
            return false;
        }

        if ($this->option('cast')) {
            $this->createCast();
        }
    }

    protected function createCast(): void
    {
        $this->call('make:cast', [
            'name' => str_replace(config('makers.makes.value-object.postfix'), '', $this->getNameInput()) . 'Cast',
        ]);
    }

    protected function getStub(): string
    {
        return $this->resolveStubPath(config('makers.makes.value-object.stubs.basic'));
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . self::NAMESPACE_SEPARATOR . config('makers.makes.value-object.namespace');
    }

    protected function getOptions(): array
    {
        return array_merge([
            ['cast', null, InputOption::VALUE_NONE, 'Create a new cast to pair with the value object'],
        ], parent::getOptions());
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.value-object.postfix');
    }
}
