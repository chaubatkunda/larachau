<?php

namespace Larachau\Ui\Console;


use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command implements PromptsForMissingInput
{
    use InstallInertiaBootstrapStack;

    protected $signature = 'larachau:install';
    protected $description = 'Install Larachau';

    public function handle(Filesystem $filesystem): int
    {
//        $this->info('Install Larachau...');
//        $this->publishStubs($filesystem);
//        return self::SUCCESS;
        return $this->installInertiaVueBootstrap();
    }

//    protected function publishStubs(Filesystem $filesystem): void
//    {
//        $source = __DIR__.'/../../stubs/inertia-vue-bootstrap';
//        $destination = base_path();
//        $filesystem->copyDirectory($source, $destination);
//    }

}