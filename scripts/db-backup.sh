#!/bin/bash

# Define database credentials
DB_NAME="Routex_db"  # Replace with your WordPress database name
DB_USER="root"  # Replace with your WordPress database user
DB_PASSWORD="password"  # Replace with your WordPress database password
DB_HOST="23.88.98.228"  # or your database server address

# Define backup location
BACKUP_DIR="/var/www/Routex/db_backup/"
DATE=$(date +\%F_\%T)  # Current date and time for backup filename
BACKUP_FILE="$BACKUP_DIR/wordpress_db_backup_$DATE.sql"

# Create backup directory if it doesn't exist
mkdir -p $BACKUP_DIR

# Run mysqldump to backup the WordPress database
mysqldump -h $DB_HOST -u $DB_USER -p$DB_PASSWORD $DB_NAME > $BACKUP_FILE

# Check if the backup was successful
if [ $? -eq 0 ]; then
  echo "Database backup was successful: $BACKUP_FILE"
else
  echo "Database backup failed!"
fi
