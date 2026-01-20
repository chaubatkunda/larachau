<?php

namespace Larachau\Ui\Console;


use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Symfony\Component\Process\Process;

class InstallCommand extends Command implements PromptsForMissingInput
{
    use InstallInertiaBootstrapStack;

    protected $signature = 'larachau:install';
    protected $description = 'Install Larachau';

    public function handle(): ?int
    {
        return $this->installInertiaVueBootstrap();
    }

//    required composer packages
    protected function requireComposerPackages(array $packages): bool
    {
        $this->info('Installing Composer dependencies...');

        $command = array_merge(['composer', 'require'], $packages);

        $process = new Process($command, base_path());
        $process->setTty(Process::isTtySupported());
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });

        return $process->isSuccessful();
    }

//    Update Node

    protected function updateNodePackages(callable $callback, bool $dev = true): void
    {
        $packageJsonPath = base_path('package.json');

        if (!file_exists($packageJsonPath)) {
            $this->warn('package.json not found, skipping NPM dependency update.');
            return;
        }

        $packages = json_decode(file_get_contents($packageJsonPath), true);

        $key = $dev ? 'devDependencies' : 'dependencies';

        $packages[$key] = $callback(
            array_key_exists($key, $packages) ? $packages[$key] : []
        );

        ksort($packages[$key]);

        file_put_contents(
            $packageJsonPath,
            json_encode($packages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES).PHP_EOL
        );
    }

}