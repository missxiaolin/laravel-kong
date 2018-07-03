<?php

return [
    'request' => [
        'headers' => [
            'TOKEN',
        ],
    ],
    'kong' => env('DOMAIN_KONG', 'http://www.laravel-kong.com'),
];
