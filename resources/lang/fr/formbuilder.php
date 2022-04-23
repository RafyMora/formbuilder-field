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
            0 => 'Non',
            1 => 'Oui',
        ],
        'created_at'          => 'date de création',
        'updated_at'          => 'date de modification',
        //
        // Form builder
        //
        'uuid'                => 'identifiant',
        'entity_form'         => 'formulaire',
        'entities_form'       => 'formulaires',
        'form_tab'            => 'Formulaire',
        'config_tab'          => 'Réglage du formulaire',
        'title'               => 'titre',
        'intro'               => 'description',
        'form'                => 'formulaire',
        'form_saved'          => 'Le formulaire à bien été sauvegardé',
        'hint_form'           => '',
        'in_database'         => 'enregistrer les entrées',
        'by_mail'             => 'envoyer par courriel',
        'display_title'       => 'afficher le titre du formulaire',
        'display_intro'       => 'afficher le texte de description',
        'text_button'         => 'texte du bouton',
        'default_text_button' => 'Envoyer le formulaire',
        'view_entries'        => 'Voir les entrées',
        //
        // Entity Form builder
        //
        'entity_entry'   => 'entrée de formulaire',
        'entities_entry' => 'entrées de formulaire',
    ],
    'validations' => [
        'form_not_found' => 'Aucun formulaire trouvé pour cette entrée.',
        'success_db' => 'Nous avons bien reçut votre soumission.'
    ]

];
