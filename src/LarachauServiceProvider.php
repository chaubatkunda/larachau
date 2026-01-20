<?php

namespace Larachau\Ui;

use Illuminate\Support\ServiceProvider;
use Larachau\Ui\Console\InstallCommand;

class LarachauServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}