#!/bin/bash

set -x;

./reset-test-db.sh

php codecept.phar run unit
php codecept.phar run functional
php codecept.phar run acceptance