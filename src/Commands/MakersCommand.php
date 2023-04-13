<?php

namespace Erenav\Makers\Commands;

use Illuminate\Console\Command;

class MakersCommand extends Command
{
    public $signature = 'makers';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
