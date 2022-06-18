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
        'hint_form'           => '',
        'in_database'         => 'save entries in database',
        'by_mail'             => 'send entries by email',
        'display_title'       => 'display form title',
        'display_intro'       => 'display description text',
        'text_button'         => 'button text',
        'default_text_button' => 'submit form',
        'view_entries'        => 'view entries',
        //
        // Entity Form builder
        //
        'entity_entry'   => 'form entry',
        'entities_entry' => 'form entries',
    ],
    'validations' => [
        'form_not_found' => 'No form found for this entry.',
        'success_db'     => 'We have received your submission.'
    ],
    'emails' => [
        'default_subject' => 'New form'
    ]

];
