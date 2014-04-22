#!/bin/bash

set -x;

script_path=`dirname $0`

$script_path/reset-test-db.sh

export CMS_HOST=localhost:31415
$script_path/generate-local-codeception-config.sh

cd $script_path

vendor/bin/codecept run unit
vendor/bin/codecept run functional
vendor/bin/codecept run acceptance --env=cms-local-chrome