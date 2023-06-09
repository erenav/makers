<?php

use Illuminate\Support\Facades\File;

it('can make a value object', function () {
    $targetPath = $this->app->basePath('app/ValueObjects');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.value-object.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:value-object {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make a value object with correct postfix', function () {
    $targetPath = $this->app->basePath('app/ValueObjects');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.value-object.postfix' => 'ValueObject']);

    $className = 'Test';
    $postFix = config('makers.makes.value-object.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:value-object {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
