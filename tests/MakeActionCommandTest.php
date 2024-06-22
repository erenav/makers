<?php

use Illuminate\Support\Facades\File;

it('can make an action', function () {
    $targetPath = $this->app->basePath('app/Actions');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.action.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:action {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make an action with correct postfix', function () {
    $targetPath = $this->app->basePath('app/Actions');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.action.postfix' => 'Action']);

    $className = 'Test';
    $postFix = config('makers.makes.action.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:action {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
