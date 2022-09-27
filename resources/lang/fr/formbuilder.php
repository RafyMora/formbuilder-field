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
        'created_at' => 'date de création',
        'updated_at' => 'date de modification',
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
        'in_database'         => 'enregistrer les entrées',
        'by_mail'             => 'envoyer par courriel',
        'display_title'       => 'afficher le titre du formulaire',
        'display_intro'       => 'afficher le texte de description',
        'text_button'         => 'texte du bouton',
        'default_text_button' => 'Envoyer le formulaire',
        'view_entries'        => 'Voir les entrées',
        'notifications_tab'   => 'Notifications',
        'notification_admin'  => '<h2>Notification Administrateur</h2>',
        'notification_user'   => '<hr><h2>Notification Utilisateur</h2>',
        'copy_user'           => 'envoyer une copie a l\'utilisateur',
        'mail_to'             => 'courriel(s) de destination',
        'include_data'        => 'afficher les informations du formulaire',
        'subject_admin'       => 'sujet du courriel',
        'message_admin'       => 'introduction du courriel',
        'subject_user'        => 'sujet du courriel',
        'message_user'        => 'introduction du courriel',
        'field_mail_name'     => 'identifiant du champs de formulaire',
        'display_captcha'     => 'Activer le Captcha Google V3',
        //
        // Entity Form builder
        //
        'entity_entry'   => 'entrée de formulaire',
        'entities_entry' => 'entrées de formulaire',
    ],
    'hints' => [
        'mail_to'              => 'Entrer les courriels séparés par des virgules.',
        'include_data'         => 'Les informations du formulaire seront envoyées avec la notification.',
        'message_admin'        => 'Message d\'introduction du courriel avant les informations du formulaire.',
        'message_user'         => 'Message d\'introduction du courriel avant les informations du formulaire.',
        'field_mail_name'      => 'Indiquer le nom du champs du formulaire contenant le courriel de l\'utilisateur (ligne "name" dans l\'édition du champ).',
        'captcha_config_error' => 'Merci de configurer le Google ReCaptcha V3 pour l\'activer.'
    ],
    'validations' => [
        'form_not_found'  => 'Aucun formulaire trouvé pour cette entrée.',
        'success_db'      => 'Nous avons bien reçut votre soumission.',
        'mail_to'         => 'Un courriel de destination est obligatoire pour l\'envoi par courriel.',
        'field_mail_name' => 'L\'identifiant du champs contenant le courriel de l\'utilisateur est obligatoire.',
        'captcha_invalid' => 'Captcha non valide.'
    ],
    'emails' => [
        'default_subject' => 'Nouvelle soumission de formulaire | :app_name',
        'no_data'         => 'Champs non renseigné',
        'message_admin'   => '<p>Bonjour,</p><p>vous avez reçut une nouvelles entrée dans votre formulaire :form_title</p>',
        'message_user'    => '<p>Bonjour,</p><p>merci d\'avoir contacté :app_name.</p><p>Nous vous recontacterons dans les plus brefs délai.</p>',
        'admin_line_1'    => '<p>Voici le contenue du formulaire :</p>',
        'user_notif_sent' => '<p>L\'utilisateur a bien reçut la notification.</p>',
        'user_data_saved' => '<p>L\'entré à été sauvegarder et est accessible depuis l\'administration <a target="_blank" href=":url_admin">accessible ici.</a></p>',
        'signature'       => '<p>L\'équipe de <a target="_blank" href=":url_site">:app_name</a></p>',
        'error_mail_user' => '<p><b>Une erreur est survenue lors de l\'envoie à l\'utilisateur, merci de vérifier le nom du champs indiqué pour le courriel.</b></p>',
        'thead' => [
            'label' => 'Nom du champ',
            'value' => 'Valeur renseignée'
        ]
    ]

];
