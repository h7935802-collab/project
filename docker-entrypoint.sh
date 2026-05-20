#!/bin/bash
# Parse DATABASE_URL in bash and write PHP config with hardcoded values
if [ -n "$DATABASE_URL" ]; then
    # Extract components from DATABASE_URL using bash
    PROTO="$(echo $DATABASE_URL | grep :// | sed -e 's,^\(.*\)://.*,\1,g')"
    URL="$(echo $DATABASE_URL | sed -e "s,$PROTO://,,g")"
    USERPASS="$(echo $URL | grep @ | cut -d@ -f1)"
    HOSTPORT="$(echo $URL | sed -e "s,$USERPASS@,,g" | cut -d/ -f1)"
    DB_NAME="$(echo $URL | grep / | cut -d/ -f2)"
    DB_USER="$(echo $USERPASS | cut -d: -f1)"
    DB_PASS="$(echo $USERPASS | cut -d: -f2)"
    DB_HOST="$(echo $HOSTPORT | cut -d: -f1)"
    DB_PORT="$(echo $HOSTPORT | cut -d: -f2)"
    [ -z "$DB_PORT" ] && DB_PORT="5432"

    cat > /var/www/html/app/Config/database.php << EOF
<?php
return [
    'driver' => 'pgsql',
    'host' => '$DB_HOST',
    'port' => $DB_PORT,
    'user' => '$DB_USER',
    'password' => '$DB_PASS',
    'dbname' => '$DB_NAME',
];
EOF
    echo "Database config generated from DATABASE_URL (host: $DB_HOST)"
else
    echo "WARNING: DATABASE_URL not set, using default config"
fi

# Run database migration
php /var/www/html/init_db.php

# Start Apache
exec apache2-foreground
