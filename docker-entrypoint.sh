#!/bin/bash
env >> /etc/apache2/envvars
exec apache2-foreground
