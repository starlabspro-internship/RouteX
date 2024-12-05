#!/bin/bash

# Ensure the script is executed with the correct environment variable
if [ -z "$VERSION" ]; then
    echo "Error: VERSION environment variable is not set."
    exit 1
fi

# Check if GITHUB_DEPLOYMENT_SLUG exists in the wp-config.php file
if grep -q "GITHUB_DEPLOYMENT_SLUG" wp-config.php; then
    # Update the existing definition with the new VERSION value
    sed -i "s/define( 'GITHUB_DEPLOYMENT_SLUG', .*/define( 'GITHUB_DEPLOYMENT_SLUG', '$VERSION' );/" wp-config.php
    echo "Updated GITHUB_DEPLOYMENT_SLUG to '$VERSION' in wp-config.php."
else
    # Append the definition if it doesn't exist
    echo "define( 'GITHUB_DEPLOYMENT_SLUG', '$VERSION' );" >> wp-config.php
    echo "Added GITHUB_DEPLOYMENT_SLUG with value '$VERSION' to wp-config.php."
fi
