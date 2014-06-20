#!/bin/bash

set -x;

# fail on any error
set -o errexit

script_path=`dirname $0`

export CMS_HOST=localhost:11111
$script_path/generate-local-codeception-config.sh

cd $script_path

export DATA=clean-db
$script_path/reset-test-db.sh

vendor/bin/codecept run unit -g data:clean-db --debug
#vendor/bin/codecept run functional -g data:clean-db --debug
touch testing
vendor/bin/codecept run acceptance --env=cms-local-chrome -g data:clean-db --debug
vendor/bin/codecept run api -g data:clean-db --debug
rm testing

export DATA=user-generated
$script_path/reset-test-db.sh

touch testing
vendor/bin/codecept run api -g data:user-generated --debug
rm testing
