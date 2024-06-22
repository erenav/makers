<?php

use Illuminate\Support\Facades\File;

it('can make a value object', function () {
    $targetPath = $this->app->basePath('app/ValueObjects');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.value.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:value {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make a value object with correct postfix', function () {
    $targetPath = $this->app->basePath('app/ValueObjects');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.value.postfix' => 'ValueObject']);

    $className = 'Test';
    $postFix = config('makers.makes.value.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:value {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
