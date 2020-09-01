<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Reset Password
    |--------------------------------------------------------------------------
    |
    | Insert your allowed reset password urls to inject into the email.
    |
    */
    'allowed-reset-password-urls' => [
          'password-reset',
    ],

    'valid_inputs' => [
        'gender' => [
            'male',
            'female',
        ],
        'military_service_status' => [
            'done',
            'due',
            'underage',
            'exempt',
        ],
        'marital_status' => [
            'married',
            'unmarried',
        ],
        'method_of_introduction' => [
            'social_media',
            'website',
            'friend',
            'street_ads',
            'divar',
        ],
        'last_educational_certificate' => [
            'none',
            'diploma',
            'associate_degree',
            'bachelor_degree',
            'master_degree',
            'doctorate',
        ],
    ],

    'avatar' => [
        'thumb' => [
            'width' => 200,
            'height' => 200,
        ],
    ],
];
