#!/bin/bash

set -x

script_path=`dirname $0`

# Note: this script is tailored to be run on dokku deployments through sshcommand

DATETIME=$(date +"%Y-%d-%m_%H%M%S")
FILENAME=ENV-$ENV.$DATETIME.sql
FILEPATH=cms/$FILENAME

# make php binaries available
export PATH="/app/vendor/php/bin/:$PATH"

$script_path/../app/yiic mysqldump --dumpFile=/tmp/$FILENAME

$script_path/configure-s3cmd.sh
s3cmd --config=/tmp/.s3cfg --acl-private --guess-mime-type put /tmp/$FILENAME "$USER_GENERATED_DATA_S3_BUCKET/$FILEPATH"

echo $FILEPATH > /app/db/user-generated-data.filepath

echo "User data backup uploaded to $USER_GENERATED_DATA_S3_BUCKET/$FILEPATH"

exit 0