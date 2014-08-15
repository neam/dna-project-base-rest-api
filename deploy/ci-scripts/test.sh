#!/bin/bash

# Script to test the deployed cms (currently to Dokku) during continuous integration

# The following env vars needs to be set properly:
# - DRONE_BUILD_DIR
# - SAUCE_USERNAME
# - SAUCE_ACCESS_KEY
# - COMPOSER_GITHUB_OAUTH_TOKEN
# - COMMIT_MESSAGE
# - BRANCH
# - CMS_APPNAME
# - CMS_HOST
# - CMS_CONFIG_ENVIRONMENT
# - DOKKU_HOST
# - TOPLEVEL_DOMAIN

# unit tests - runs within a dokku app container

$DRONE_BUILD_DIR/ci-scripts/dokku-run-workaround.sh ssh dokku@$DOKKU_HOST run $CMS_APPNAME /app/deploy/dokku-run-unit-tests.sh

# acceptance tests - runs within the current drone container using saucelabs for selenium server

# Output saucelabs username in log output
echo SAUCE_USERNAME=$SAUCE_USERNAME

# test deps
cd tests
export COMPOSER_NO_INTERACTION=1
apt-get update
apt-get install -y -q php5-cli php5-curl mysql-client
php ../composer.phar install --dev --prefer-dist

# import database connection details from the cms dokku deployment
$DRONE_BUILD_DIR/ci-scripts/dokku-run-workaround.sh ssh dokku@$DOKKU_HOST run $CMS_APPNAME /app/app/yiic config exportDbConfig --connectionID=db | tee /tmp/db-config.sh
tr -d $'\r' < /tmp/db-config.sh > /tmp/db-config.clean.sh
source /tmp/db-config.clean.sh

# set-up ssh tunnel against dokku host to be able to access db instance
ssh dokku@$DOKKU_HOST -v -N -L 43306:$DB_HOST:$DB_PORT &

# wait for a maximum of 30 sec for tunnel to be active
export DB_HOST=127.0.0.1
export DB_PORT=43306
set +o errexit # allow failure during this phase
for SEQ in {1..30}; do

    echo "Verifying local db access - try $SEQ out of 30";

    # verify local db access
    echo "SELECT 1;" | mysql -h$DB_HOST -P$DB_PORT -u$DB_USER --password=$DB_PASSWORD

    if [ $? != 0 ]; then
        sleep 1
    else
        break;
    fi

    # give up after 30 seconds
    if [ $SEQ -gt 30 ]; then
        echo "Giving up after 30 seconds - could not connect to mysql through ssh tunnel";
        exit 1;
    fi

done;

# again - fail on any error
set -o errexit

# generate codeception config
./generate-local-codeception-config.sh

# use ci-configuration for deployment while running tests
ssh dokku@$DOKKU_HOST config:set $CMS_APPNAME CONFIG_ENVIRONMENT=ci

# run acceptance tests
export env=cms-saucelabs-chrome-win8
#export env=cms-saucelabs-firefox-win7
#export env=cms-saucelabs-chrome-osx-108
vendor/bin/codecept run acceptance-init --env=$env -g data:$DATA --debug --fail-fast
#mysqldump --user="$DB_USER" --password="$DB_PASSWORD" --host="$DB_HOST" --port="$DB_PORT" --no-create-db db > codeception/_data/dump.sql
vendor/bin/codecept run acceptance --env=$env -g data:$DATA --debug --fail-fast

# run api tests
vendor/bin/codecept run api -g data:$DATA --debug --fail-fast

# restore config-environment
ssh dokku@$DOKKU_HOST config:set $CMS_APPNAME CONFIG_ENVIRONMENT=$CMS_CONFIG_ENVIRONMENT
