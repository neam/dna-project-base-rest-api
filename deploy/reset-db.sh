#!/bin/bash

set -x;

# fail on any error
set -o errexit

app/yiic databaseschema --connectionID=db dropAllTablesAndViews --verbose=0
app/yiic databaseschema --connectionID=db loadSql --path=db/schema.sql --verbose=0

rm -rf app/data/p3media/*
# todo: find a way to ensure that previously uploaded media can be restored from, possible similar to below but that works more than once
#mkdir .trashed-p3media-data
#mv app/data/p3media/* .trashed-p3media-data/

if [ "$DATA" == "user-generated" ]; then

    if [ ! -f db/user-generated-data.sql ]; then

        echo "== Fetching the user-generated data associated with this commit =="

        shell-scripts/configure-s3cmd.sh

        if [ -f db/user-generated-data.filepath ]; then

            export USER_GENERATED_DATA_S3_BUCKET="s3://user-data-backups"
            export USER_GENERATED_DATA_FILEPATH=`cat db/user-generated-data.filepath`
            export USER_GENERATED_DATA_S3_URL=$USER_GENERATED_DATA_S3_BUCKET/$USER_GENERATED_DATA_FILEPATH
            s3cmd -v --config=/tmp/.s3cfg get "$USER_GENERATED_DATA_S3_URL" db/user-generated-data.sql

            echo "User data dump downloaded from $USER_GENERATED_DATA_S3_URL to db/user-generated-data.sql"

        else
            echo "Error: the file db/user-generated-data.filepath needs to be available and contain the relative path in the S3 bucket that contains the sql dump with the user-generated data"
        fi

    fi

    if [ ! -d db/user-generated-media/ ]; then

        echo "== Fetching the user-generated media associated with this commit =="

        if [ -f db/user-generated-data.folderpath ]; then

            export USER_GENERATED_MEDIA_S3_BUCKET="s3://user-data-backups"
            export USER_GENERATED_MEDIA_FOLDERPATH=`cat db/user-generated-data.folderpath`
            export USER_GENERATED_MEDIA_S3_URL=$USER_GENERATED_MEDIA_S3_BUCKET/$USER_GENERATED_MEDIA_FOLDERPATH
            mkdir db/user-generated-media/
            s3cmd -v --config=/tmp/.s3cfg --recursive get "$USER_GENERATED_MEDIA_S3_URL" db/user-generated-media/

            echo "User media downloaded from $USER_GENERATED_DATA_S3_URL to db/user-generated-media/"

        else
            echo "Error: the file db/user-generated-data.folderpath needs to be available and contain the relative path in the S3 bucket that contains the user-generated media files"
        fi

    fi

    echo "===== Load the user-generated data associated with this commit ===="

    # load mysql dump
    # app/yiic databaseschema --connectionID=db loadSql --path=db/user-generated-data.sql --verbose=1
    mysql -A --host=$DB_HOST --port=$DB_PORT --user=$DB_USER --password=$DB_PASSWORD $DB_NAME < db/user-generated-data.sql

    # copy the downloaded data to the persistant p3media folder
    cp -r db/user-generated-media/* app/data/p3media/

fi

app/yiic fixture --connectionID=db load
app/yiic migrate --connectionID=db --interactive=0
app/yiic databaseviewgenerator --connectionID=db item
