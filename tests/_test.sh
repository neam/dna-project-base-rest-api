#!/bin/bash

set -x;

# fail on any error
set -o errexit

script_path=`dirname $0`
cd $script_path

export COVERAGE=full

../app/yiic config exportDbConfig --connectionID=dbTest | tee /tmp/config.sh
source /tmp/config.sh
echo "DROP DATABASE IF EXISTS $DB_NAME; CREATE DATABASE $DB_NAME;" | mysql -h$DB_HOST -P$DB_PORT -u$DB_USER --password=$DB_PASSWORD

export CMS_HOST=localhost:12121/friends
./generate-local-codeception-config.sh
vendor/bin/codecept build

export DATA=clean-db
source _set-codeception-group-args.sh
connectionID=dbTest $script_path/../shell-scripts/reset-db.sh

../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
vendor/bin/codecept run unit $CODECEPTION_GROUP_ARGS --debug --fail-fast
#vendor/bin/codecept run functional -g data:clean-db --debug
touch testing
vendor/bin/codecept run acceptance-init --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
vendor/bin/codecept run acceptance --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
vendor/bin/codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast
rm testing

export DATA=user-generated
source _set-codeception-group-args.sh
connectionID=dbTest $script_path/../shell-scripts/reset-db.sh

../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
vendor/bin/codecept run unit $CODECEPTION_GROUP_ARGS --debug --fail-fast
#vendor/bin/codecept run functional -g data:clean-db --debug

touch testing
vendor/bin/codecept run acceptance-init --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
vendor/bin/codecept run acceptance --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
vendor/bin/codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast
rm testing
