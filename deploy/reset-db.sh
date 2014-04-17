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

        export USER_GENERATED_DATA_S3_BUCKET="s3://user-data-backups"
        export USER_GENERATED_DATA_FILEPATH=`cat db/user-generated-data.filepath`
        export USER_GENERATED_DATA_S3_URL=$USER_GENERATED_DATA_S3_BUCKET/$USER_GENERATED_DATA_FILEPATH
        s3cmd --config=/tmp/.s3cfg get "$USER_GENERATED_DATA_S3_URL" db/user-generated-data.sql

        echo "User data dump downloaded from $USER_GENERATED_DATA_S3_URL to db/user-generated-data.sql"

    fi

    if [ ! -f db/user-generated-media/ ]; then

        echo "== Fetching the user-generated media associated with this commit =="

        export USER_GENERATED_MEDIA_S3_BUCKET="s3://user-data-backups"
        export USER_GENERATED_MEDIA_FOLDERPATH=`cat db/user-generated-data.folderpath`
        export USER_GENERATED_MEDIA_S3_URL=$USER_GENERATED_MEDIA_S3_BUCKET/$USER_GENERATED_MEDIA_FOLDERPATH
        mkdir db/user-generated-media/
        s3cmd --config=/tmp/.s3cfg get "$USER_GENERATED_MEDIA_S3_URL" db/user-generated-media/

        echo "User media downloaded from $USER_GENERATED_DATA_S3_URL to db/user-generated-media/"

    fi

    echo "===== Load the user-generated data associated with this commit ===="

    app/yiic fixture --connectionID=db load --dump=db/user-generated-data.sql
    cp -r db/user-generated-p3media/* app/data/p3media/

fi

app/yiic fixture --connectionID=db load
app/yiic migrate --connectionID=db --interactive=0
app/yiic databaseviewgenerator --connectionID=db item
