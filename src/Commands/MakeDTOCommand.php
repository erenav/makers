<?php

namespace Erenav\Makers\Commands;

use Symfony\Component\Console\Input\InputOption;

class MakeDTOCommand extends MakersCommand
{
    protected $name = 'makers:dto';

    protected $description = 'Create a new dto class';

    protected $type = 'DTO';

    public function handle()
    {
        if(parent::handle() === false && !$this->option('force')) {
            return false;
        }

        if($this->option('factory')) {
            $this->createFactory();
        }
    }

    protected function createFactory(): void
    {
        $namespace = $this->getDefaultNamespace($this->rootNamespace());

        $import = $namespace . self::NAMESPACE_SEPARATOR . $this->getNameInput();

        $import = str_replace('\\\\', '\\', $import);

        $this->call('makers:generic-factory', [
            'name' => $this->getNameInput(),
            '--import' => $import,
        ]);
    }

    protected function getStub(): string
    {
        return $this->resolveStubPath(
            $this->option('readonly')
                ? config('makers.makes.dto.stubs.readonly')
                : config('makers.makes.dto.stubs.basic')
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
            ['factory', null, InputOption::VALUE_NONE, 'Create a new factory for the dto'],
        ], parent::getOptions());
    }

    protected function getPostfix(): string
    {
        return config('makers.makes.dto.postfix');
    }
}
