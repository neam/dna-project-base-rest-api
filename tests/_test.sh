#!/bin/bash

set -x;

if [ "$0" == "-bash" ]; then
    echo "Assuming running sourced from within web container"
    echo "Note: When sourcing this script, you must reside within the tests folder"
    script_path=/code/cms/tests
else
    script_path=`dirname $0`
    cd $script_path
    # fail on any error
    set -o errexit
fi

# run composer install on both app and tests directories
cd $script_path/..
php composer.phar install --prefer-source
cd $script_path
php ../composer.phar install --prefer-source

# defaults

if [ "$COVERAGE" == "" ]; then
    export COVERAGE=full
fi

../app/yiic config exportDbConfig --connectionID=dbTest | tee /tmp/config.sh
../app/yiic config exportEnvbootstrapConfig --connectionID=dbTest | tee -a /tmp/config.sh
source /tmp/config.sh
echo "DROP DATABASE IF EXISTS $DB_NAME; CREATE DATABASE $DB_NAME;" | mysql -h$DB_HOST -P$DB_PORT -u$DB_USER --password=$DB_PASSWORD

export CMS_HOST=localhost:12121/friends
./generate-local-codeception-config.sh
vendor/bin/codecept build

export DATA=clean-db
source _set-codeception-group-args.sh
connectionID=dbTest ../shell-scripts/reset-db.sh

../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
vendor/bin/codecept run unit $CODECEPTION_GROUP_ARGS --debug --fail-fast
#vendor/bin/codecept run functional -g data:clean-db --debug
touch testing
vendor/bin/codecept run acceptance-init --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
vendor/bin/codecept run acceptance --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
vendor/bin/codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast
rm testing

export DATA=user-generated
source _set-codeception-group-args.sh
connectionID=dbTest ../shell-scripts/reset-db.sh

../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
vendor/bin/codecept run unit $CODECEPTION_GROUP_ARGS --debug --fail-fast
#vendor/bin/codecept run functional -g data:clean-db --debug

touch testing
vendor/bin/codecept run acceptance-init --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
vendor/bin/codecept run acceptance --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
vendor/bin/codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast
rm testing
