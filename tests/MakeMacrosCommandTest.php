<?php

use Illuminate\Support\Facades\File;

it('can make a macros class', function () {
    $targetPath = $this->app->basePath('app/Macros');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.macros.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:macros {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make an macros with correct postfix', function () {
    $targetPath = $this->app->basePath('app/Macros');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.macros.postfix' => 'Pipe']);

    $className = 'Test';
    $postFix = config('makers.makes.macros.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:macros {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
