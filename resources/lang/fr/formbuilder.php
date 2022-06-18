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
        'success_db'     => 'Nous avons bien reçut votre soumission.'
    ],
    'emails' => [
        'default_subject' => 'Nouveau formulaire reçut',
        'no_data'         => 'Champs non renseigné',
        'admin_line_1'    => '<p>Bonjour,<br>vous avez reçut une nouvelles entrée dans votre formulaire :form_title</p>',
        'admin_line_2'    => '<p>Voici le contenue du formulaire :</p>',
        'admin_line_3'    => '<p>L\'utilisateur a bien reçut la notification.</p>',
        'admin_line_4'    => '<p>L\'entré à été sauvegarder et est accessible depuis l\'administration <a target="_blank" href=":url_admin">accessible ici.</a></p>',
    ]

];
