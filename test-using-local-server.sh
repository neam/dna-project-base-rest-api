set -x;

php -S localhost:31415 -t www/ > /dev/null 2>&1 & echo $! > test-php.pid

./_test.sh

kill -9 `cat test-php.pid`
rm test-php.pid