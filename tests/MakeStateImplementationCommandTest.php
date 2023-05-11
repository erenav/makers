<?php

use Illuminate\Support\Facades\File;

it('can make an state-implementation', function () {
    $targetPath = $this->app->basePath('app/States');

    File::deleteDirectory($targetPath);

    $className = 'Test';
    $postFix = config('makers.makes.state-implementation.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:state-implementation {$className} TestParent")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});

it('can make an state-implementation with correct postfix', function () {
    $targetPath = $this->app->basePath('app/States');

    File::deleteDirectory($targetPath);

    // override the config value
    config(['makers.makes.state-implementation.postfix' => 'State']);

    $className = 'Test';
    $postFix = config('makers.makes.state-implementation.postfix');

    $name = "{$className}{$postFix}";

    $this->artisan("makers:state-implementation {$name} TestParent")->assertExitCode(0);

    $this->assertFileExists($targetPath . "/{$name}.php");
});
