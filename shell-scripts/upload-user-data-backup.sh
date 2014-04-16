#!/bin/bash

set -x

# Note: this script is tailored to be run on dokku deployments through sshcommand

DATETIME=$(date +"%Y-%d-%m_%H%M%S")
FILENAME=ENV-$ENV.$DATETIME.sql
FILEPATH=cms/$FILENAME

# make php binaries available
export PATH="/app/vendor/php/bin/:$PATH"

app/yiic mysqldump --dumpFile=/tmp/$FILENAME

s3cmd --access_key="$USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY" --secret_key="$USER_DATA_BACKUP_UPLOADERS_SECRET" put /tmp/$FILENAME "$USER_GENERATED_DATA_S3_BUCKET/$FILEPATH"

echo $FILEPATH > /app/db/user-generated-data.filepath

echo "User data backup uploaded to $USER_GENERATED_DATA_S3_BUCKET/$FILEPATH"

exit 0