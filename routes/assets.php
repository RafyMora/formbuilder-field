<?php

use Illuminate\Support\Facades\Route;

Route::get('/formbuilder-field/{file}', function ($file) {
    $path = __DIR__ . '/../resources/assets/' . $file;

    abort_unless(file_exists($path), 404);

    return response()->file($path, [
        'Cache-Control' => 'max-age=31536000, public',
    ]);
})->where('file', '.*');
