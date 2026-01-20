<?php

namespace Larachau\Ui;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Larachau\Ui\Console\InstallCommand;

class LarachauServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function provides(): array
    {
        return [InstallCommand::class];
    }
}