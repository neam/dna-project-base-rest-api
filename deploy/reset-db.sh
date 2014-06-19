#!/bin/bash

# make sure that the persistent p3media folder exists
deploy/configure-persistent-p3media.sh

# set s3 credentials
deploy/configure-s3cmd.sh

set -x;

script_path=`dirname $0`

connectionID=db

# fail on any error
set -o errexit

cd $script_path/..

app/yiic databaseschema --connectionID=$connectionID dropAllTablesAndViews --verbose=0

if [ "$DATA" == "user-generated" ]; then

    echo "===== Load the user-generated data associated with this commit ===="

    shell-scripts/fetch-user-generated-data.sh

    # load mysql dump
    # app/yiic databaseschema --connectionID=db loadSql --path=db/migration-base/user-generated/data.sql --verbose=1
    mysql -A --host=$DB_HOST --port=$DB_PORT --user=$DB_USER --password=$DB_PASSWORD $DB_NAME < db/migration-base/user-generated/data.sql

    # copy the downloaded data to the p3media folder
    rm -rf app/data/p3media/*
    # todo: find a way to ensure that previously uploaded media can be restored from, possible similar to below but that works more than once
    #mkdir .trashed-p3media-data
    #mv app/data/p3media/* .trashed-p3media-data/
    cp -r db/migration-base/user-generated/media/* app/data/p3media/

    # make downloaded media directories owned and writable by the web server
    chown -R nobody: app/data/p3media/

fi

if [ "$DATA" == "clean-db" ]; then

    app/yiic databaseschema --connectionID=db loadSql --path=db/migration-base/clean-db/schema.sql --verbose=0
    app/yiic databaseschema --connectionID=db loadSql --path=db/migration-base/clean-db/data.sql --verbose=0

fi

if [ "$DATA" == "" ]; then

    echo "The environment variable DATA needs to be set"
    exit 1

fi

app/yiic fixture --connectionID=db load
shell-scripts/yiic-migrate.sh --connectionID=db --interactive=0
app/yiic databaseviewgenerator --connectionID=db item
