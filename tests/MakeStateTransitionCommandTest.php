<?php

use Illuminate\Support\Facades\File;

it('can make a state transition', function () {
    $targetPath = $this->app->basePath('app/Transitions');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.state-transition.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:state-transition {$className} ModelName")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make a state transition with correct postfix', function () {
    $targetPath = $this->app->basePath('app/Transitions');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.state-transition.postfix' => 'Transition']);

    $className = 'Test';
    $postFix = config('makers.makes.state-transition.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:state-transition {$name} ModelName")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
