<?php

namespace RafyMora\FormbuilderField\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InitFormBuilderFieldInstallation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'formbuilderfield:installation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Script call after installation via composer';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = __('rafy-mora.formbuilder-field::formbuilder.labels.entity');
        $nameTitle = ucfirst(Str::camel($name));
        $nameKebab = 'formbuilder';
        $namePlural = ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.entities_form'));

        $this->call('migrate');
        
        $this->call('vendor:publis', [
            '--provider' => "RafyMora\FormbuilderField\AddonServiceProvider",
            '--tag' => "config"
        ]);
        $this->call('vendor:publis', [
            '--provider' => "RafyMora\FormbuilderField\AddonServiceProvider",
            '--tag' => "assets"
        ]);

        // Create the sidebar item
        $this->call('backpack:add-sidebar-content', [
            'code' => "<li class='nav-item'><a class='nav-link' href='{{ backpack_url('$nameKebab') }}'><i class='nav-icon la la-database'></i> " . $namePlural . "</a></li>",
        ]);

        // if the application uses cached routes, we should rebuild the cache so the previous added route will
        // be acessible without manually clearing the route cache.
        if (app()->routesAreCached()) {
            $this->call('route:cache');
        }
    }
}
