<?php

return [
    'request' => [
        'headers' => [
            'TOKEN',
            'Content-Type'
        ],
    ],
    'kong' => env('DOMAIN_KONG', 'http://www.laravel-kong.com'),
];
