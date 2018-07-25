<?php

return [
    'request' => [
        'headers' => [
            'Authorization',
            'Content-Type'
        ],
    ],
    'kong' => env('DOMAIN_KONG', 'http://www.laravel-kong.com'),
];
