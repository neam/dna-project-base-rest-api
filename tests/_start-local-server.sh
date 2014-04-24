#!/bin/bash

php -S localhost:31415 -t ../www/ > /dev/null 2>&1 & echo $! > test-php.pid