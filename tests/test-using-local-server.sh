#!/bin/bash

set -x;

script_path=`dirname $0`

$script_path/_start-local-server.sh

$script_path/_test.sh

kill -9 `cat test-php.pid`
rm test-php.pid