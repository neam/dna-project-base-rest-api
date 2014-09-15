#!/bin/bash

set -x;

script_path=`dirname $0`
cd $script_path
# fail on any error
set -o errexit

export DATA=clean-db
source $TESTS_FRAMEWORK_BASEPATH/_set-codeception-group-args.sh
connectionID=dbTest ../db/shell-scripts/reset-db.sh

../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
$TESTS_FRAMEWORK_BASEPATH/vendor/bin/codecept run unit $CODECEPTION_GROUP_ARGS --debug --fail-fast
#vendor/bin/codecept run functional -g data:clean-db --debug

connectionID=dbTest ../db/shell-scripts/reset-db.sh

touch testing
$TESTS_FRAMEWORK_BASEPATH/vendor/bin/codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast
rm testing

export DATA=user-generated
source $TESTS_FRAMEWORK_BASEPATH/_set-codeception-group-args.sh
connectionID=dbTest ../db/shell-scripts/reset-db.sh

../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
$TESTS_FRAMEWORK_BASEPATH/vendor/bin/codecept run unit $CODECEPTION_GROUP_ARGS --debug --fail-fast
#vendor/bin/codecept run functional -g data:clean-db --debug

connectionID=dbTest ../db/shell-scripts/reset-db.sh

touch testing
$TESTS_FRAMEWORK_BASEPATH/vendor/bin/codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast
rm testing
