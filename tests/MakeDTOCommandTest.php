<?php

use Illuminate\Support\Facades\File;

it('can make an dto', function () {
    $targetPath = $this->app->basePath('app/DTOs');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.dto.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:dto {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make an dto with correct postfix', function () {
    $targetPath = $this->app->basePath('app/DTOs');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.dto.postfix' => 'Data']);

    $className = 'Test';
    $postFix = config('makers.makes.dto.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:dto {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
