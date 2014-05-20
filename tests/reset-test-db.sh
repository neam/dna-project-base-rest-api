#!/bin/bash -v -x

script_path=`dirname $0`

connectionID=dbTest

cd $script_path/..

app/yiic databaseschema --connectionID=$connectionID dropAllTablesAndViews --verbose=0

if [ "$DATA" == "user-generated" ]; then

    echo "===== Load the user-generated data associated with this commit ===="

    # load mysql dump
    # TODO fix what is causing the following command to crash (it is most likely the file size of > 1 MB)
    #app/yiic databaseschema --connectionID=$connectionID loadSql --path=db/user-generated-data.sql

    # TODO Remove this once the todo above has been fixed
    DB_HOST=localhost
    DB_PORT=3306
    DB_USER=gcms_test
    DB_PASSWORD=gcms_test
    DB_NAME=gscms_test
    mysql -A --host=$DB_HOST --port=$DB_PORT --user=$DB_USER --password=$DB_PASSWORD $DB_NAME < db/migration-base/user-generated/schema.sql
    mysql -A --host=$DB_HOST --port=$DB_PORT --user=$DB_USER --password=$DB_PASSWORD $DB_NAME < db/migration-base/user-generated/data.sql

    # copy the downloaded data to the persistant p3media folder
    cp -r db/migration-base/user-generated-media/* app/data/p3media/

fi

if [ "$DATA" == "clean-db" ]; then

    app/yiic databaseschema --connectionID=$connectionID loadSql --path=db/migration-base/clean-db/schema.sql
    app/yiic databaseschema --connectionID=$connectionID loadSql --path=db/migration-base/clean-db/data.sql

fi

app/yiic fixture --connectionID=$connectionID load
app/yiic migrate --connectionID=$connectionID --interactive=0 # > /dev/null
app/yiic databaseviewgenerator --connectionID=$connectionID item

app/yiic mysqldump --connectionID=$connectionID