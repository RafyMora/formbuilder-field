<?php

return [
    // enter the email for receipient if yout form are sending by mail
    'email_destination' => config('mail.from.address', 'admin@test-laravel.com'),
    'model_form'        => RafyMora\FormbuilderField\Models\Formbuilder::class,
];
