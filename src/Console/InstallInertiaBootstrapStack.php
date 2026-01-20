<?php

namespace Larachau\Ui\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallInertiaBootstrapStack
{
    protected function installInertiaVueBootstrap()
    {
        if (!$this->requireComposerPackages([
            'inertiajs/inertia-laravel',
            'laravel/sanctum',
            'laravel/wayfinder'
        ])) {
            return 1;
        }

//        NPM Package
        $this->updateNodePackages(function ($package) {
            return [
                    "bootstrap @popperjs/core",
                    "--save-dev sass",
                    "bootstrap-icons",
                    "vite",
                    "laravel-vite-plugin",
                    "@vitejs/plugin-vue",
                    "@laravel/vite-plugin-wayfinder"
                ] + $package;
        });

        // Providers...
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia-vue-bootstrap/app/Providers',
            app_path('Providers'));

        // Controllers...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia-vue-bootstrap/app/Http/Controllers',
            app_path('Http/Controllers'));

        // Requests...
//        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
//        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/app/Http/Requests', app_path('Http/Requests'));

        // Middleware...
//        $this->installMiddleware([
//            '\App\Http\Middleware\HandleInertiaRequests::class',
//            '\Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class',
//        ]);

//        (new Filesystem)->ensureDirectoryExists(app_path('Http/Middleware'));
//        copy(__DIR__.'/../../stubs/inertia-common/app/Http/Middleware/HandleInertiaRequests.php',
//            app_path('Http/Middleware/HandleInertiaRequests.php'));

        // Views...
//        copy(__DIR__.'/../../stubs/inertia-vue/resources/views/app.blade.php', resource_path('views/app.blade.php'));

//        @unlink(resource_path('views/welcome.blade.php'));

        // Components + Pages...
//        (new Filesystem)->ensureDirectoryExists(resource_path('js/Components'));
//        (new Filesystem)->ensureDirectoryExists(resource_path('js/Layouts'));
//        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages'));
    }
}