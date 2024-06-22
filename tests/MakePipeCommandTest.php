<?php

use Illuminate\Support\Facades\File;

it('can make an pipe', function () {
    $targetPath = $this->app->basePath('app/Pipes');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.pipe.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:pipe {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make an pipe with correct postfix', function () {
    $targetPath = $this->app->basePath('app/Pipes');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.pipe.postfix' => 'Pipe']);

    $className = 'Test';
    $postFix = config('makers.makes.pipe.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:pipe {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
