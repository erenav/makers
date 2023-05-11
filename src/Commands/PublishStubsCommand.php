<?php

namespace Erenav\Makers\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class PublishStubsCommand extends Command
{
    use ConfirmableTrait;

    protected $signature = 'makers:publish-stubs {--force : Overwrite existing stub files}';

    protected $description = 'Publish all makers stubs available for customization';

    private Filesystem $filesystem;

    public function __construct(FileSystem $filesystem)
    {
        parent::__construct();

        $this->filesystem = $filesystem;
    }

    public function handle(): int
    {
        if (!$this->confirmToProceed()) {
            return 1;
        }

        $targetPath = $this->laravel->basePath(config('makers.publish.path'));

        if (!$this->filesystem->isDirectory($targetPath)) {
            $this->filesystem->makeDirectory(path: $targetPath, recursive: true);
        }

        $files = new Collection();

        $this->collectFiles($files, __DIR__ . '/../../stubs');

        $publishedCount = $this->publishFiles($files);

        $this->info("Published {$publishedCount} files.");

        return 0;
    }

    public function collectFiles(Collection $files, string $path): void
    {
        collect(File::directories($path))
            ->each(function (string $directory) use ($files) {
                $this->collectFiles($files, $directory);
            });

        collect(File::files($path))
            ->when((!$this->option('force')), function (Collection $files) {
                return $files->reject(function (SplFileInfo $file) {
                    return file_exists($this->targetPath($file));
                });
            })
            ->each(function (SplFileInfo $file) use ($files) {
                $files->push($file);
            });
    }

    public function publishFiles(Collection $files): int
    {
        return $files->reduce(function (int $published, SplFileInfo $file) {
            file_put_contents(
                $this->targetPath($file),
                file_get_contents($file->getPathname())
            );

            return $published + 1;
        }, 0);
    }

    public function targetPath(SplFileInfo $file): string
    {
        return $this->laravel->basePath(config('makers.publish.path')) . '/' . $file->getFilename();
    }
}
