#!/bin/bash

# runs tests against the current deployment
# expects that reset-db.sh has been executed just before and that CONFIG_ENVIRONMENT has been set to "ci"

# The following env vars needs to be set properly:
# - SAUCE_USERNAME
# - SAUCE_ACCESS_KEY
# - COMPOSER_GITHUB_OAUTH_TOKEN
# - CMS_HOST
# - CONFIG_ENVIRONMENT
# - COVERAGE

# debug
set -x

# fail on any error
set -o errexit

# get arguments
COVERAGE=$1

# initialize env vars so that we have app config and PATH properly set
export HOME=/app
for file in /app/.profile.d/*; do source $file; done

# info
echo "Running tests with coverage '$COVERAGE' in config environment '$CONFIG_ENVIRONMENT'"

# install test deps
cd $HOME
cd tests
export COMPOSER_NO_INTERACTION=1
php ../composer.phar install --dev --prefer-dist

# generate local test config
./generate-local-codeception-config.sh
vendor/bin/codecept build

# set the codeception test group arguments depending on DATA and COVERAGE
source _set-codeception-group-args.sh

# run unit tests
../app/yiic mysqldump --connectionID=db --dumpPath=tests/codeception/_data/
vendor/bin/codecept run unit $CODECEPTION_ARGS --fail-fast

# run acceptance tests
export env=cms-saucelabs-chrome-win8
#export env=cms-saucelabs-firefox-win7
#export env=cms-saucelabs-chrome-osx-108
vendor/bin/codecept run acceptance-init --env=$env $CODECEPTION_GROUP_ARGS --debug --fail-fast
#mysqldump --user="$DB_USER" --password="$DB_PASSWORD" --host="$DB_HOST" --port="$DB_PORT" --no-create-db db > codeception/_data/dump.sql
vendor/bin/codecept run acceptance --env=$env $CODECEPTION_GROUP_ARGS --debug --fail-fast

# run api tests
vendor/bin/codecept run api -g data:$DATA --debug --fail-fast

exit 0