<?php

return [

/**
 * General Configurations
 */
    'general' => [
        'env' => env('APP_ENV') ?? 'dev',
        'https' => false,
    ],

/**
 * Database Configuration
 */
    'database' => [

        'host' => env('DB_HOST') ?? '',
        'database' => env('DB_HOST') ?? '',
        'user' => env('DB_USER') ?? '',
        'password' => env('DB_PASSWORD') ?? '',
        'dbname' => env('DB_NAME') ?? '',
        'driver' => 'pdo_mysql',
        'port' => '3306',

    ],

];