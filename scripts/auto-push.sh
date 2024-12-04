#!/bin/bash
cd /var/www/RouteX || exit
git add .  # Stage all changes
git commit -m "Automated commit from server changes" || echo "No changes to commit"
git push origin main  # Push the changes to GitHub
