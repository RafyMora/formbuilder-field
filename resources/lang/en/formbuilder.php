<?php

return [

    /*
    |--------------------------------------------------------------------------
    | RafyMora\FormbuilderField Translation Lines
    |--------------------------------------------------------------------------
    */
    'labels' => [
        //
        // Common
        //
        'bool' => [
            0 => 'No',
            1 => 'Yes',
        ],
        'created_at'          => 'creating date',
        'updated_at'          => 'editing date',
        //
        // Form builder
        //
        'uuid'                => 'identifier',
        'entity_form'         => 'form',
        'entities_form'       => 'forms',
        'form_tab'            => 'Form',
        'config_tab'          => 'form setting',
        'title'               => 'title',
        'intro'               => 'description',
        'form'                => 'form',
        'form_saved'          => 'This form are saved succesfully',
        'in_database'         => 'save entries in database',
        'by_mail'             => 'send entries by email',
        'display_title'       => 'display form title',
        'display_intro'       => 'display description text',
        'text_button'         => 'button text',
        'default_text_button' => 'submit form',
        'view_entries'        => 'view entries',
        'notifications_tab'   => 'Notifications',
        'notification_admin'  => '<h2>Administrator notification</h2>',
        'notification_user'   => '<hr><h2>User notification</h2>',
        'copy_user'           => 'Send a copy to a user',
        'mail_to'             => 'email(s) of destination',
        'include_data'        => 'display form information',
        'subject_admin'       => 'email subject',
        'message_admin'       => 'email text intro',
        'subject_user'        => 'email subject',
        'message_user'        => 'email text intro',
        'field_mail_name'     => 'name for form fields',
        'display_captcha'     => 'ReCaptcha Google V3 activated',
        //
        // Entity Form builder
        //
        'entity_entry'   => 'form entry',
        'entities_entry' => 'form entries',
    ],
    'hints' => [
        'mail_to'              => 'Enter emails separated by commas.',
        'include_data'         => 'The form information will be sent with the notification.',
        'message_admin'        => 'Email introduction message before form information.',
        'message_user'         => 'Email introduction message before form information.',
        'field_mail_name'      => 'Indicate the name of the form field containing the user\'s email ("name" line in the field edition).',
        'captcha_config_error' => 'Please configure Google ReCaptcha V3 to enable it.'
    ],
    'validations' => [
        'form_not_found'  => 'No form found for this entry.',
        'success_db'      => 'We have received your submission.',
        'mail_to'         => 'A destination email is required for emailing.',
        'field_mail_name' => 'The username of the field containing the user\'s email is required.',
        'captcha_invalid' => 'Invalid captcha.'
    ],
    'emails' => [
        'default_subject' => 'New form submission | :app_name',
        'no_data'         => 'Fields not filled in',
        'message_admin'   => '<p>Hello,</p><p>you have received a new entry in your form:form_title</p>',
        'message_user'    => '<p>Hello,</p><p>thank you for contacting :app_name.</p><p>We will get back to you as soon as possible.</p>',
        'admin_line_1'    => '<p>Here is the content of the form:</p>',
        'user_notif_sent' => '<p>User received notification.</p>',
        'user_data_saved' => '<p>The entry has been saved and is accessible from the administration <a target="_blank" href=":url_admin">accessible here.</a></p>',
        'signature'       => '<p>The <a target="_blank" href=":url_site">:app_name</a></p> team',
        'error_mail_user' => '<p><b>An error occurred while sending to the user, please check the field name indicated for the email.</b></p>',
        'head'            => [
            'label' => 'Field name',
            'value' => 'Value filled in'
        ]
    ]

];
