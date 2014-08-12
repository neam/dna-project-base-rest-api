#!/bin/bash

# debug
set -x

# fail on any error
set -o errexit

# initialize env vars so that we have app config and PATH properly set
export HOME=/app
for file in /app/.profile.d/*; do source $file; done

# install test deps
cd $HOME
cd tests
php ../composer.phar install

# make sure the db_test database exists and is empty
export DB_NAME=db_test
echo "DROP DATABASE IF EXISTS $DB_NAME; CREATE DATABASE $DB_NAME;" | mysql -h$DB_HOST -P$DB_PORT -u$DB_USER --password=$DB_PASSWORD

# generate local test config
export CMS_HOST=localhost:5000
./generate-local-codeception-config.sh

# reset the test database to a clean db satet
export CONFIG_ENVIRONMENT=test
export DATA=clean-db
connectionID=dbTest ../shell-scripts/reset-db.sh

# run unit tests
../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
vendor/bin/codecept run unit -g data:$DATA --fail-fast

exit 0