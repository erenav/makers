<?php

namespace Erenav\Makers\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Erenav\Makers\MakersServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            MakersServiceProvider::class,
        ];
    }
}
