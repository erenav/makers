<?php

use Illuminate\Support\Facades\File;

it('can make a base state', function () {
    $targetPath = $this->app->basePath('app/States');

    File::deleteDirectory($targetPath);

    $className = 'Test';

    $postFix = config('makers.makes.states.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:states {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}" . "/{$name}.php");
});

it('can make a base state with correct postfix', function () {
    $targetPath = $this->app->basePath('app/States');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.states.postfix' => 'State']);

    $className = 'Test';
    $postFix = config('makers.makes.states.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:states {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}" . "/{$name}.php");
});
