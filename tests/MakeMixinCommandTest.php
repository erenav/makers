<?php

use Illuminate\Support\Facades\File;

it('can make a mixin class', function () {
    $targetPath = $this->app->basePath('app/Mixins');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.mixin.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:mixin {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make an mixin with correct postfix', function () {
    $targetPath = $this->app->basePath('app/Mixins');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.mixin.postfix' => 'Pipe']);

    $className = 'Test';
    $postFix = config('makers.makes.mixin.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:mixin {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
