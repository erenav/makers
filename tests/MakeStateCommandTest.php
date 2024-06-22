<?php

use Illuminate\Support\Facades\File;

it('can make a state', function () {
    $targetPath = $this->app->basePath('app/States');

    File::deleteDirectory($targetPath);

    $className = 'Test';

    $postFix = config('makers.makes.state.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:state {$className} TestParent")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/TestParent" . "/{$name}.php");
});

it('can make a state with correct postfix', function () {
    $targetPath = $this->app->basePath('app/States');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.state.postfix' => 'State']);

    $className = 'Test';
    $postFix = config('makers.makes.state.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("make:state {$name} TestParent")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/TestParent" . "/{$name}.php");
});
