<?php

return [

    // Add or remove style from form package
    'styles' => [
        'packages/@digitallyhappy/backstrap/css/style.min.css'
    ],

    // Add or remove script if already call in your header
    'scripts' => [
        'https://code.jquery.com/jquery-3.4.1.min.js',
        'https://code.jquery.com/ui/1.13.0/jquery-ui.min.js'
    ],

    'languages' => 'fr-FR',
    
    'model_form' => RafyMora\FormbuilderField\Models\Formbuilder::class,
    
    'button_class' => 'btn btn-primary',
    
    'email' => [
        // enter the email for receipient if yout form are sending by mail
        'form' => config('mail.from.address', 'admin-from@test-laravel.com'),
        'to' => config('mail.from.address', 'admin-to@test-laravel.com'),
    ],
    'captcha_v3_site_key' => env('FB_CAPTCHA_SITE_KEY', null),
    'captcha_v3_secret_key' => env('FB_CAPTCCHA_SECRET_KEY', null),
];
