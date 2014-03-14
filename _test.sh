set -x;

./reset-test-db.sh
php codecept.phar run unit

./reset-test-db.sh
php codecept.phar run functional

./reset-test-db.sh
php codecept.phar run acceptance