<?php

namespace Erenav\Makers\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Symfony\Component\Console\Input\InputOption;

abstract class MakersCommand extends GeneratorCommand
{
    protected const NAMESPACE_SEPARATOR = '\\';

    protected function resolveStubPath(string $stub): string
    {
        $stub = trim($stub, '/');

        $customStub = $this->laravel->basePath('stubs/' . $stub);

        if (file_exists($customStub)) {
            return $customStub;
        }

        return __DIR__ . '/../../stubs/' . $stub;
    }

    protected function getNameInput(): string
    {
        return Str::of(parent::getNameInput())
                  ->whenEndsWith(
                      $this->getPostfix(),
                      function (Stringable $string) {
                          return $string;
                      },
                      function (Stringable $string) {
                          return $string->append($this->getPostfix());
                      }
                  )
                  ->toString();
    }

    protected function getOptions(): array
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if it already exists'],
        ];
    }

    protected function getPostfix(): string
    {
        return '';
    }

}
