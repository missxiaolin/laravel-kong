<?php

return [
    'request' => [
        'headers' => [
            'TOKEN',
        ],
    ],
    'kong' => env('DOMAIN_KONG', 'www.laravel-kong.com'),
];
