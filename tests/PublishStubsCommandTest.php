<?php

use Illuminate\Support\Facades\File;

it('can publish stubs', function () {
    $targetStubsPath = $this->app->basePath('stubs/makers/');
    $stubsPath = __DIR__ . '/../stubs/';

    $filesCount = count(File::files($stubsPath));

    File::deleteDirectory($targetStubsPath);

    $this->artisan('makers:publish-stubs')
        ->expectsOutput("Published {$filesCount} files.")
        ->assertExitCode(0);

    foreach (config('makers.makes') as $values) {
        foreach ($values['stubs'] as $stub) {
            $stubPath = $stubsPath . $stub;

            $publishedStubPath = $targetStubsPath . $stub;

            $this->assertFileEquals($stubPath, $publishedStubPath);
        }
    }
});
