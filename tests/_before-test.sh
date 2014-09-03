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

export CMS_BASE_URL=127.0.0.1:12121/friends
export CMS_HOST=$LOCAL_SERVICES_IP:11111 # $LOCAL_SERVICES_IP is necessary since API testing is done directly through curl
./generate-local-codeception-config.sh
vendor/bin/codecept build
