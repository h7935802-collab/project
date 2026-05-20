#!/bin/bash
# Inject all environment variables into Apache's envvars so PHP can read them
env >> /etc/apache2/envvars
# Start Apache in foreground (default Docker behavior)
exec apache2-foreground
