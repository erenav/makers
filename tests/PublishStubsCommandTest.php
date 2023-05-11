<?php

use Illuminate\Support\Facades\File;

it('can publish stubs', function () {
    $targetStubsPath = $this->app->basePath('stubs/makers');

    File::deleteDirectory($targetStubsPath);

    $this->artisan('makers:publish-stubs')
         ->expectsOutput('Published 10 files.')
         ->assertExitCode(0);

    foreach (config('makers.makes') as $values) {
        foreach ($values['stubs'] as $stub) {
            $stubPath = __DIR__ . '/../stubs/' . $stub;

            $publishedStubPath = $targetStubsPath . '/' . $stub;

            $this->assertFileEquals($stubPath, $publishedStubPath);
        }
    }
});
