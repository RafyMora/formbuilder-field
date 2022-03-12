<?php

namespace RafyMora\FormbuilderField;

use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'rafy-mora';
    protected $packageName = 'formbuilder-field';
    protected $commands = [];
}
