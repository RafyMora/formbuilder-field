<?php

namespace RafyMora\FormbuilderField;

use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'rafy-mora';
    protected $packageName = 'formbuilder-field';
    protected $commands = [];

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (
            $this->packageDirectoryExistsAndIsNotEmpty('bootstrap') &&
            file_exists($helpers = $this->packageHelpersFile())
        ) {
            require $helpers;
        }

        if ($this->packageDirectoryExistsAndIsNotEmpty('resources/lang')) {
            $this->loadTranslationsFrom($this->packageLangsPath(), $this->vendorNameDotPackageName());
        }

        if ($this->packageDirectoryExistsAndIsNotEmpty('resources/views')) {
            // Load published views
            $this->loadViewsFrom($this->publishedViewsPath(), $this->vendorNameDotPackageName());

            // Fallback to package views
            $this->loadViewsFrom($this->packageViewsPath(), $this->vendorNameDotPackageName());
        }

        if ($this->packageDirectoryExistsAndIsNotEmpty('database/migrations')) {
            $this->loadMigrationsFrom($this->packageMigrationsPath());
        }

        if ($this->packageDirectoryExistsAndIsNotEmpty('routes')) {
            $this->loadRoutesFrom($this->packageRoutesFile());
        }

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }
}
