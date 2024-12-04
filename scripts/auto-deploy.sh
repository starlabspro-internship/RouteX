#!/bin/bash

# Navigate to the WordPress directory (adjust as necessary)
cd /var/www/RouteX || exit

# Pull the latest changes from GitHub
git pull origin main

# Flush WordPress cache as the 'www-data' user (or the user your server runs as)
sudo -u www-data wp cache flush

# Restart Nginx to apply changes
sudo systemctl restart nginx
