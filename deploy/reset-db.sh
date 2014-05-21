#!/bin/bash

set -x;

# fail on any error
set -o errexit

app/yiic databaseschema --connectionID=db dropAllTablesAndViews --verbose=0

rm -rf app/data/p3media/*
# todo: find a way to ensure that previously uploaded media can be restored from, possible similar to below but that works more than once
#mkdir .trashed-p3media-data
#mv app/data/p3media/* .trashed-p3media-data/

# make sure that the persistent p3media folder exists
deploy/configure-persistent-p3media.sh

# set s3 credentials
shell-scripts/configure-s3cmd.sh

if [ "$DATA" == "user-generated" ]; then

    shell-scripts/fetch-user-generated-data.sh

    echo "===== Load the user-generated data associated with this commit ===="

    # load mysql dump
    # app/yiic databaseschema --connectionID=db loadSql --path=db/migration-base/user-generated/data.sql --verbose=1
    mysql -A --host=$DB_HOST --port=$DB_PORT --user=$DB_USER --password=$DB_PASSWORD $DB_NAME < db/migration-base/user-generated/data.sql

    # copy the downloaded data to the persistant p3media folder
    cp -r db/migration-base/user-generated/media/* app/data/p3media/

fi

if [ "$DATA" == "clean-db" ]; then

    app/yiic databaseschema --connectionID=db loadSql --path=db/migration-base/clean-db/schema.sql --verbose=0
    app/yiic databaseschema --connectionID=db loadSql --path=db/migration-base/clean-db/data.sql --verbose=0

fi

app/yiic fixture --connectionID=db load
shell-scripts/yiic-migrate.sh --connectionID=db --interactive=0
app/yiic databaseviewgenerator --connectionID=db item
