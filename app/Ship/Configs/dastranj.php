<?php

return [
    'default'   => [
        'avatar'    =>  '/images/default-avatar.svg',
        'avatar_thumb'    =>  '/images/default-avatar.svg',
    ],

    'storage_path' => env('API_URL', 'http://localhost') . '/v1/storage',
    'storage_path_replace' => str_replace(['http://', 'https://'], '', env('APP_URL', 'http://localhost')) . '/storage',
];
