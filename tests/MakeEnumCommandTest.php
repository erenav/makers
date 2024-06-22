<?php

use Illuminate\Support\Facades\File;

it('can make an enum', function () {
    $targetPath = $this->app->basePath('app/Enums');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.enum.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:enum {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make an enum with correct postfix', function () {
    $targetPath = $this->app->basePath('app/Enums');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.enum.postfix' => 'Enum']);

    $className = 'Test';
    $postFix = config('makers.makes.enum.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:enum {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make a backed enum', function () {
    $targetPath = $this->app->basePath('app/Enums');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.enum.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:enum {$className} --type=string")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
