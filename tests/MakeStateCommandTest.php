<?php

use Illuminate\Support\Facades\File;

it('can make an state', function () {
    $targetPath = $this->app->basePath('app/States');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.state.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:state {$className}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make an state with correct postfix', function () {
    $targetPath = $this->app->basePath('app/States');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.state.postfix' => 'State']);

    $className = 'Test';
    $postFix = config('makers.makes.state.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:state {$name}")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
