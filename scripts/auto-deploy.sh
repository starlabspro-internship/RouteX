#!/bin/bash

# Set the log file path
LOG_FILE="/var/log/auto-push.log"

# Start logging
echo "Git commit and push started at $(date)" >> $LOG_FILE

# Change directory to your WordPress project
cd /var/www/RouteX || { echo "Failed to cd into /var/www/RouteX"; exit 1; }

# Check for any changes in the directory
git status >> $LOG_FILE 2>&1

# Stage all changes made to the repo
git add . >> $LOG_FILE 2>&1

# Commit changes with a message
git commit -m "Automated commit from server changes" >> $LOG_FILE 2>&1

# Check if there were any changes to commit
if [ $? -eq 0 ]; then
    # If changes were committed, push to GitHub
    git push origin main >> $LOG_FILE 2>&1
else
    # No changes to commit
    echo "No changes to commit" >> $LOG_FILE
fi

# End logging
echo "Git commit and push finished at $(date)" >> $LOG_FILE
