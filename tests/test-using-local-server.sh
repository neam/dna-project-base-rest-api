#!/bin/bash

set -x;

# fail on any error
set -o errexit

script_path=`dirname $0`

$script_path/_start-local-server.sh

$script_path/_test.sh

kill -9 `cat test-php.pid`
rm test-php.pid