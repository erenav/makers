<?php

use Illuminate\Support\Facades\File;

it('can make an generic factory', function () {
    $targetPath = $this->app->basePath('app/Factories');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.generic-factory.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:generic-factory {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make an generic factory with correct postfix', function () {
    $targetPath = $this->app->basePath('app/Factories');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.generic-factory.postfix' => 'Factory']);

    $className = 'Test';
    $postFix = config('makers.makes.generic-factory.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:generic-factory {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
