#!/bin/bash

# Set the log file path
LOG_FILE="/var/log/auto-pull.log"

# Start logging
echo "Git pull started at $(date)" >> $LOG_FILE

# Change directory to your WordPress project
cd /var/www/RouteX || { echo "Failed to cd into /var/www/RouteX"; exit 1; }

# Pull the latest changes from GitHub
git pull origin main >> $LOG_FILE 2>&1

# Log the completion of the pull operation
echo "Git pull finished at $(date)" >> $LOG_FILE
