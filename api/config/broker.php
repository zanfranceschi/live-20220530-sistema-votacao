<?php

return [
    'drivers' => [
        'rabbitmq' => [
            'host' => env('RABBITMQ_HOST', 'bbb-queue'),
            'port' => env('RABBITMQ_PORT', 5672),
            'user' => env('RABBITMQ_USER', 'root'),
            'password' => env('RABBITMQ_PASSWORD', 'root'),
            'queue' => env('RABBITMQ_QUEUE', 'default'),
        ]
    ]
];
