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

    // enter the email for receipient if yout form are sending by mail
    'email_destination' => config('mail.from.address', 'admin@test-laravel.com'),

    'model_form'        => RafyMora\FormbuilderField\Models\Formbuilder::class,

    'button_class' => 'btn btn-primary'
];
