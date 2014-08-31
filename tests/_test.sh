#!/bin/bash

set -x;

# fail on any error
set -o errexit

script_path=`dirname $0`

export COVERAGE=full

export CMS_HOST=localhost:12121/friends
$script_path/generate-local-codeception-config.sh
vendor/bin/codecept build

cd $script_path

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
