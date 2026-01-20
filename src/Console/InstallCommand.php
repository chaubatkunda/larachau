<?php

namespace Larachau\Ui\Console;


use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{

    protected $signature = 'larachau:install';
    protected $description = 'Install Larachau';

    public function handle(Filesystem $filesystem): int
    {
        $this->info('Install Larachau...');
        $this->publishStubs($filesystem);

        return self::SUCCESS;
    }

    protected function publishStubs(Filesystem $filesystem): void
    {
        $source = __DIR__.'/../../stubs/inertia-vue-bootstrap';
        $destination = base_path();
        $filesystem->copyDirectory($source, $destination);
    }

}