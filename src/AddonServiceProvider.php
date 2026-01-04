<?php

namespace RafyMora\FormbuilderField;

use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'rafy-mora';
    protected $packageName = 'formbuilder-field';

    protected $commands = [
        \RafyMora\FormbuilderField\Console\Commands\InitFormBuilderFieldInstallation::class
    ];

    public function boot()
    {
        // Charge helpers si présents
        if ($this->packageDirectoryExistsAndIsNotEmpty('bootstrap') &&
            file_exists($helpers = $this->packageHelpersFile())) {
            require $helpers;
        }

        // Charge config
        if ($this->packageDirectoryExistsAndIsNotEmpty('config')) {
            $this->publishes([
                $this->packageConfigFile() => $this->publishedConfigFile(),
            ], 'config');
        }

        // Traductions
        if ($this->packageDirectoryExistsAndIsNotEmpty('resources/lang')) {
            $this->loadTranslationsFrom(
                $this->packageLangsPath(),
                $this->vendorNameDotPackageName()
            );
        }

        // Vues
        if ($this->packageDirectoryExistsAndIsNotEmpty('resources/views')) {
            $this->loadViewsFrom($this->packageViewsPath(), $this->vendorNameDotPackageName());
        }

        // Migrations
        if ($this->packageDirectoryExistsAndIsNotEmpty('database/migrations')) {
            $this->loadMigrationsFrom($this->packageMigrationsPath());
        }

        if ($this->packageDirectoryExistsAndIsNotEmpty('routes')) {
            $this->loadRoutesFrom($this->packageRoutesFile());
            $this->loadRoutesFrom($this->packageAsssetsRoutesFile());
        }

        // Console only
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    protected function bootForConsole(): void
    {
        if (!empty($this->commands)) {
            $this->commands($this->commands);
        }
    }

    public function register()
    {
        $this->commands($this->commands);
    }
}
