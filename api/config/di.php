<?php

$inspiration = require __DIR__ . '/../app/Domains/Inspiration/di.php';

return [
    'definitions' => [
        ...$inspiration
    ],
];
