#!/bin/bash

set -x;

script_path=`dirname $0`
cd $script_path
# fail on any error
set -o errexit

export DATA=test-db
source $TESTS_FRAMEWORK_BASEPATH/_set-codeception-group-args.sh
echo "Resetting DB to $DATA"
connectionID=dbTest $PROJECT_BASEPATH/bin/reset-db.sh >> codeception/_log/reset-db.log

start_api_mock_server $PROJECT_BASEPATH/yiiapps/rest-api/app/modules/v1/api-blueprint.md
codecept run api-v1 $CODECEPTION_GROUP_ARGS --debug --fail-fast --env=apiary
stop_api_mock_server

activate_test_config
codecept run api-v1 $CODECEPTION_GROUP_ARGS --debug --fail-fast --env=cms-rest-api
inactivate_test_config

#export DATA=user-generated
#source $TESTS_FRAMEWORK_BASEPATH/_set-codeception-group-args.sh
#echo "Resetting DB to $DATA"
#connectionID=dbTest $PROJECT_BASEPATH/bin/reset-db.sh >> codeception/_log/reset-db.log
#
#activate_test_config
#codecept run api-v1 $CODECEPTION_GROUP_ARGS --debug --fail-fast
#inactivate_test_config
