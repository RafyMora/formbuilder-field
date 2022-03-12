<?php

/*
|--------------------------------------------------------------------------
| RafyMora\FormbuilderField Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the RafyMora\FormbuilderField package.
|
*/


/**
 * Admin Routes
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
], function () {
    Route::crud('formbuilder', \RafyMora\FormbuilderField\Http\Controllers\Admin\FormbuilderCrudController::class);
});