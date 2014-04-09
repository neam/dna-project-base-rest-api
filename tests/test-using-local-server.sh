#!/bin/bash

set -x;

./_start-local-server.sh

./_test.sh

kill -9 `cat test-php.pid`
rm test-php.pid