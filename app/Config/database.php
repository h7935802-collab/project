<?php

// Support environment variables for production (Render) and fallback for local development
return [
    'host' => getenv('DB_HOST') ?: 'localhost',
    'port' => (int)(getenv('DB_PORT') ?: 5432),
    'user' => getenv('DB_USER') ?: 'root',
    'password' => getenv('DB_PASSWORD') ?: '',
    'dbname' => getenv('DB_NAME') ?: 'emc_db',
    'driver' => getenv('DB_DRIVER') ?: 'pgsql'
];
