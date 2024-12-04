#!/bin/bash
cd /var/www/RouteX || exit
git pull origin main  # Pull the latest changes from GitHub
wp cache flush  # Clear WordPress cache (optional)
sudo systemctl restart nginx  # Restart Nginx or Apache
