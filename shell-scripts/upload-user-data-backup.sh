#!/bin/bash

set -x

# fail on any error
set -o errexit

script_path=`dirname $0`

# Note: this script is tailored to be run on dokku deployments through sshcommand

# configure s3cmd
$script_path/configure-s3cmd.sh

# make php binaries available
export PATH="/app/vendor/php/bin/:$PATH"

DATETIME=$(date +"%Y-%d-%m_%H%M%S")
FOLDER=ENV-$ENV

# dump and upload sql

FILENAME=$DATETIME.sql
FILEPATH=cms/$FOLDER/$FILENAME

if [ -f db/dump.sql ] ; then
    rm db/dump.sql
fi
$script_path/../app/yiic mysqldump
if [ ! -f db/dump.sql ] ; then
    echo "The mysql dump is not found at the expected location: db/dump.sql"
    exit 1
fi
s3cmd -v --config=/tmp/.s3cfg put db/dump.sql "$USER_GENERATED_DATA_S3_BUCKET/$FILEPATH"

echo $FILEPATH > /app/db/user-generated-data.filepath
echo "User data sql dump uploaded to $USER_GENERATED_DATA_S3_BUCKET/$FILEPATH"
echo "Set the contents of 'db/user-generated-data.filepath' to '$FILEPATH' in order to use this upload"

# dump and upload user media

FOLDERPATH=cms/$FOLDER/$DATETIME.user-generated-media/

s3cmd -v --config=/tmp/.s3cfg --recursive put $script_path/../app/data/p3media/ "$USER_GENERATED_DATA_S3_BUCKET/$FOLDERPATH"
echo $FOLDERPATH > /app/db/user-generated-media.folderpath

echo "User media uploaded to $USER_GENERATED_DATA_S3_BUCKET/$FOLDERPATH"
echo "Set the contents of 'db/user-generated-media.folderpath' to '$FOLDERPATH' in order to use this upload"

exit 0