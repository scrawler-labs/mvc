<?php

return [

/**
 * General Configurations
 */
    'general' => [
        'env' => getenv('APP_ENV') ?? 'dev',
        'https' => false,
    ],

/**
 * Database Configuration
 */
    'database' => [

        'host' => getenv('DB_HOST') ?? '',
        'database' => getenv('DB_HOST') ?? '',
        'username' => getenv('DB_USER') ?? '',
        'password' => getenv('DB_PASSWORD') ?? '',
        'dbname' => getenv('DB_NAME') ?? '',
        'driver' => 'pdo_mysql',
        'port' => '3306',

    ],

];