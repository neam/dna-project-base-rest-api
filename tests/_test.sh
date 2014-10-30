#!/bin/bash

set -x;

script_path=`dirname $0`
cd $script_path
# fail on any error
set -o errexit

export DATA=clean-db
source $TESTS_FRAMEWORK_BASEPATH/_set-codeception-group-args.sh
connectionID=dbTest $PROJECT_BASEPATH/vendor/neam/yii-dna-pre-release-testing/shell-scripts/reset-db.sh

api-mock ./v1/sdfsdfkjlsdflkjdsf/apiary.md  --port 3000

touch testing
codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast --env=apiary
codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast --env=cms-rest-api
rm testing

export DATA=user-generated
source $TESTS_FRAMEWORK_BASEPATH/_set-codeception-group-args.sh
connectionID=dbTest $PROJECT_BASEPATH/vendor/neam/yii-dna-pre-release-testing/shell-scripts/reset-db.sh

touch testing
codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast
rm testing
