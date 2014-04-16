#!/bin/bash

set -x;

script_path=`dirname $0`

$script_path/reset-test-db.sh

export CMS_HOST=localhost:31415/index-test.php
$script_path/generate-local-codeception-config.sh

php codecept.phar run unit
php codecept.phar run functional
php codecept.phar run acceptance --env=cms-local-chrome