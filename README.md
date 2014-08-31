Gapminder School CMS
====================

This web application is used by the community as well as Gapminder staff to author, translate and publish the educational material.

## Local set-up

* Create your local configuration file:


    cp app/config/envbootstrap/local/envbootstrap.dist.php app/config/envbootstrap/local/envbootstrap.php

* Set-up a local docker containers running CMS web and db as per the instructions in `../virtual-machines/vagrant/cms/README.md`
* If you already did the above, just make sure you have the web and db containers up and running:


    ../virtual-machines/vagrant/cms/scripts/start-cms-containers.sh

* Follow "Reset the database" below
* Follow "Update to the latest changes" below
* Now your CMS installation should be accessible on [http://127.0.0.1:12121/friends/]() (Non-proxied version at [http://localhost:11111]()) and you should be able to login with admin/admin
* Note: You might need to use dos2unix in order to fix bash script line endings in order to run shell-scripts

## Useful commands

To verify that the database can be accessed from the local work station:

    ../virtual-machines/vagrant/cms/scripts/verify-db-access.sh

To ssh into the web container (Note: the db container does not support ssh):

    ../virtual-machines/vagrant/cms/scripts/ssh.sh

To follow the logs in the containers, run:

    ../virtual-machines/vagrant/cms/scripts/logs.sh

## A note about running the commands below

To run these commands locally, the following binaries must be installed locally and available in your PATH:

    * php
    * npm
    * bower
    * mysql
    * mysqldump
    * git

The following environment variable also needs to be set:

    export LOCAL_SERVICES_IP=127.0.0.1

Alternatively, you can run these commands inside the web container (where all of the above are already installed). Enter by running:

    ../virtual-machines/vagrant/cms/scripts/ssh.sh

Before running any commands below, step in to the root of the cms codebase `/code/` and make all environment variables available:

    cd /code/cms/
    for file in /app/.profile.d/*; do source $file; done

## Update to the latest changes

After pulling the latest changes, compare your `local/envbootstrap.php` against `local/envbootstrap.dist.php` and merge in relevant new configuration options/changes from the latter.

Then, run the following to update your local environment:

    php composer.phar --prefer-source install
    npm install
    bower install --allow-root --config.interactive=false
    shell-scripts/yiic-migrate.sh

## Reset the database

### To reset to a clean database

    export DATA=clean-db
    connectionID=db shell-scripts/reset-db.sh

### To reset to a database with user generated data:

First, install s3cmd (https://github.com/s3tools/s3cmd). Then, configure it:

    # S3 credentials that can read from s3://user-data-backups
    export USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY="replaceme"
    export USER_DATA_BACKUP_UPLOADERS_SECRET="replaceme"
    deploy/configure-s3cmd.sh

Then, run:

    export DATA=user-generated
    app/yiic config exportDbConfig --connectionID=db > /tmp/db-config.sh
    source /tmp/db-config.sh
    connectionID=db shell-scripts/reset-db.sh

## Tests

### Test suites

* `unit` - Contains unit tests that verify low-level functionality.
* `acceptance-init` - Contains the initial set of acceptance tests that should be run from an empty (reset) database and verifies basic functionality and registers a set of test users.
* `acceptance` - Contains the full set of acceptance tests [TODO: that uses a database dump taken at the end of running `acceptance-init` (and thus contains a set of test users)]
* `api` - Contains acceptance tests that verify various aspects of the REST API.

### Test groups

#### data

We want to be able to develop/test the code both starting from an empty database, and with data imported from a production deployment. These two testing-data-scenarios are referred to as "clean-db" vs "user-generated", and all acceptance tests are grouped into one or both of these.

* `clean-db`
* `user-generate`

#### coverage

We group all tests based on how much testing coverage is required, so that builds and tests can run faster in cases when full test coverage is not essential:

* `minimal` - The minimal set of tests (default setting for automatic tests in feature branches and on develop)
* `basic` - A little more refined set of tests (default setting for automatic tests in release branches and for production)
* `full` - Includes registering of test users and the life cycle scenario tests (default setting for developers running local tests)
* `paranoid` - Includes long-running tests that were created to protect against various regressions (it is recommended for developers to run these tests locally before finishing a feature branch)

### Running tests locally

First, decide whether or not to run tests against a clean database or with user generated data:

    export DATA=clean-db
    OR
    export DATA=user-generated # be sure to have s3cmd configured properly as per above

If you are running these commands locally, set the following environment variables:

    export SELENIUM_HOST=$LOCAL_SERVICES_IP
    export SELENIUM_PORT=4444

Or, if you are running these commands from within the web container:

    export SELENIUM_HOST=$LOCAL_SERVICES_IP
    export SELENIUM_PORT=14444

Then, do the following before attempting to run any tests:

    cd tests
    php ../composer.phar install

    ../app/yiic config exportDbConfig --connectionID=dbTest | tee /tmp/config.sh
    ../app/yiic config exportEnvbootstrapConfig --connectionID=dbTest | tee -a /tmp/config.sh
    source /tmp/config.sh
    echo "DROP DATABASE IF EXISTS $DB_NAME; CREATE DATABASE $DB_NAME;" | mysql -h$DB_HOST -P$DB_PORT -u$DB_USER --password=$DB_PASSWORD

    export CMS_HOST=127.0.0.1:12121/friends
    ./generate-local-codeception-config.sh
    vendor/bin/codecept build

Now, set the level of test coverage to run and set the appropriate codeception arguments:

    export COVERAGE=full
    OR any of:
    export COVERAGE=minimal
    export COVERAGE=basic
    export COVERAGE=paranoid

    # set the codeception test group arguments depending on DATA and COVERAGE
    source _set-codeception-group-args.sh

To reset the test database (necessary in order to run tests from scratch or to re-run the `acceptance-init` suite since it does not reset the database itself by design):

    export CONFIG_ENVIRONMENT=test
    connectionID=dbTest ../shell-scripts/reset-db.sh

To run the unit tests:

    ../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
    vendor/bin/codecept run unit $CODECEPTION_GROUP_ARGS --debug --fail-fast

To run the functional tests (Note: Not currently used):

    #vendor/bin/codecept run functional $CODECEPTION_GROUP_ARGS --debug --fail-fast

Note: For the remaining tests, you need to have a selenium server running locally (see below in readme).

To run the acceptance suites:

    touch testing # this activates a special flag in envbootstrap.php that makes the test db the default db
    vendor/bin/codecept run acceptance-init --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
    ../app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
    vendor/bin/codecept run acceptance --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast
    rm testing

To run the the API suite:

    touch testing
    vendor/bin/codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast
    rm testing

All tests can be run in sequence (for both clean-db and user-generated) by running the `_test.sh` script:

    ./_test.sh

Note: The `touch testing` makes the app default to "test" CONFIG_ENVIRONMENT, which means it will use the TEST_DB_* parameters for database access and have captcha disabled in the registration form.

## Running a Selenium server locally

For the acceptance tests above, you need to have a selenium server running locally. The selenium server controls your locally installed browsers and thus can't be run within the web container. Thus, open run these commands locally in a different terminal window/tab som the above.

Ensure that you have Java installed and then start [the selenium server](http://docs.seleniumhq.org/download/) locally:

    # if you haven't downloaded the server already
    wget http://selenium-release.storage.googleapis.com/2.42/selenium-server-standalone-2.42.2.jar

    # start the selenium server
    java -jar selenium-server-standalone-2.42.2.jar

    # if above doesn't work, try specifying chromedriver explicitly
    java -jar selenium-server-standalone-2.42.2.jar -Dwebdriver.chrome.driver=./chromedriver

## Running tests locally against Saucelabs

First deploy the code to dokku (see "Deploy using Dokku" below), so that the env vars `DOKKU_HOST`, `CMS_HOST`, and `CMS_APPNAME` are available.

Also, make sure that `DATA`, `COVERAGE` and `CODECEPTION_GROUP_ARGS` are set appropriately.

(Not currently necessary: Follow the instructions under "Set up an SSH tunnel to be able to access the deployed database locally")

Generate configuration as if running in ci:

    cd tests
    export SAUCELABS=1
    export SAUCE_ACCESS_KEY=replaceme
    export SAUCE_USERNAME=gapminder
    export SAUCE_METADATA_BUILD=local-saucelabs-testing
    export SAUCE_METADATA_TAGS=cms,data:$DATA,deployment:local,base_url:$CMS_HOST #todo: use CMS_BASE_URL instead
    # generate codeception config
    ./generate-local-codeception-config.sh
    vendor/bin/codecept build

Then, run the tests:

    # use ci-configuration for deployment while running tests
    ssh dokku@$DOKKU_HOST config:set $CMS_APPNAME CONFIG_ENVIRONMENT=ci

    # run acceptance tests (choose an appropriate env value)
    export env=cms-saucelabs-chrome-win8
    export env=cms-saucelabs-firefox-win7
    export env=cms-saucelabs-chrome-osx-108
    vendor/bin/codecept run acceptance-init --env=$env $CODECEPTION_GROUP_ARGS --debug --fail-fast
    #mysqldump --user="$DB_USER" --password="$DB_PASSWORD" --host="$DB_HOST" --port="$DB_PORT" --no-create-db db > codeception/_data/dump.sql
    vendor/bin/codecept run acceptance --env=$env $CODECEPTION_GROUP_ARGS --debug --fail-fast
    vendor/bin/codecept run api $CODECEPTION_GROUP_ARGS --debug --fail-fast

### Hints for test developers

To run an individual test, in this example an acceptance test:

     vendor/bin/codecept run acceptance-init --env=cms-local-chrome $CODECEPTION_GROUP_ARGS --debug --fail-fast 04-VerifyCleanDbCept.php

In general, consult the documentation at http://codeception.com/docs/modules/WebDriver and related Codeception docs.

A useful method while developing tests locally is pauseExecution(). It only has effect if tests are run with the `--debug` flag (as per above). It pauses the execution and let's you use developer tools or similar to inspect the current state of things. For instance, if you can't a selector to work, add it just before the problematic selector:

    <?php
    $scenario->group('data:clean-db');
    $I = new WebGuy\MemberSteps($scenario);
    $I->wantTo('login and see result');
    $I->login('admin', 'admin');
    $I->pauseExecution(); // <-- here
    $I->see('Welcome to Gapminder', 'h4');

Happy test development!

## Managing project dependencies

Composer, npm and bower are used to manage dependencies. Check their respective documentation for how they are used. For npm, we use shrinkwrap (built-in) and clingwrap (`npm install -g clingwrap`) in order to lock down dependencies. After ordinary modifications to package.json and `npm install`, run the following:

    npm prune
    npm shrinkwrap
    clingwrap npmbegone

Then, commit the changes to `npm-shrinkwrap.json` (npm's equivalent to `composer.lock`) using git.

## Deploy

Builds and runs with PHP 5.4.26, Nginx 1.4.3. However note that php cli runs version 5.4.6 (default Ubuntu Quantal).

Requires Dokku master branch and the following plugins:

 - For post-buildstep.sh to run properly - https://github.com/musicglue/dokku-user-env-compile
 - For MySQL-compatible database access - https://github.com/Kloadut/dokku-md-plugin
 - For mounting persistent cache directory at runtime - https://github.com/dyson/dokku-docker-options

To build and deploy (regardless of target), first set some fundamental config vars:

    export APPNAME=foo1-cms
    export CURRENT_BRANCH=develop

### Deploy using Dokku

To build and deploy on dokku, first set dokku host config var:

    export DOKKU_HOST=dokku.gapminderdev.org
    export CMS_HOST=$APPNAME.gapminderdev.org
    OR, for production use:
    export DOKKU_HOST=dokku.gapminder.org
    export CMS_HOST=$APPNAME.gapminder.org

Then, push to a dokku repository:

    git push dokku@$DOKKU_HOST:$APPNAME $CURRENT_BRANCH:master

You will also need to run the following once after the initial push:

    # replace `replaceme` with valid S3 credentials to be able to import/export user-generated data (DATA=user-generated)

    export USER_GENERATED_DATA_S3_BUCKET="s3://user-data-backups"
    export USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY="replaceme"
    export USER_DATA_BACKUP_UPLOADERS_SECRET="replaceme"

    # connect a db instance

    ssh dokku@$DOKKU_HOST mariadb:create $APPNAME

    # set environment variables

    export CMS_CONFIG_ENVIRONMENT=development
    export COMPOSER_GITHUB_TOKEN="replaceme"
    export NEW_RELIC_LICENSE_KEY="replaceme"
    export NEW_RELIC_APP_NAME="replaceme"
    export SMTP_URL="replaceme"
    export GA_TRACKING_ID="replaceme"
    export SENTRY_DSN="replaceme"
    export SAUCE_USERNAME="replaceme"
    export SAUCE_ACCESS_KEY="replaceme"
    export CMS_BASE_URL=$CMS_HOST

    ssh dokku@$DOKKU_HOST config:set $APPNAME \
    ENVBOOTSTRAP_STRATEGY=environment-variables \
    ENV=dokku/$APPNAME \
    BRAND_SITENAME=Gapminder-CMS-$APPNAME \
    BRAND_DOMAIN=$CMS_HOST \
    USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY=$USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY \
    USER_DATA_BACKUP_UPLOADERS_SECRET=$USER_DATA_BACKUP_UPLOADERS_SECRET \
    USER_GENERATED_DATA_S3_BUCKET=$USER_GENERATED_DATA_S3_BUCKET \
    CONFIG_ENVIRONMENT=$CMS_CONFIG_ENVIRONMENT \
    COMPOSER_GITHUB_TOKEN=$COMPOSER_GITHUB_TOKEN \
    NEW_RELIC_LICENSE_KEY=$NEW_RELIC_LICENSE_KEY \
    NEW_RELIC_APP_NAME=dokku/$APPNAME \
    SMTP_URL=$SMTP_URL \
    GA_TRACKING_ID=$GA_TRACKING_ID \
    SENTRY_DSN=$SENTRY_DSN \
    SAUCE_USERNAME=$SAUCE_USERNAME \
    SAUCE_ACCESS_KEY=$SAUCE_ACCESS_KEY \
    CMS_BASE_URL=$CMS_BASE_URL \
    CMS_HOST=$CMS_HOST \
    NGINX_VHOSTS_CUSTOM_CONFIGURATION=deploy/nginx-vhosts-custom-configuration.conf.erb

    # add persistent folder to running container (not recommended dokku-practice, but necessary until p3media is replaced with a fully network-based-solution)

    export DOKKU_ROOT=/home/dokku
    ssh dokku@$DOKKU_HOST docker-options:add $APPNAME "-v $DOKKU_ROOT/$APPNAME/cache:/cache"

To reset the db to a clean state:

    export DATA=clean-db
    # run these commands one by one (they will not all run if pasted into the console together)
    ssh dokku@$DOKKU_HOST config:set $APPNAME DATA=$DATA
    # run these commands one by one (they will not all run if pasted into the console together)
    ssh dokku@$DOKKU_HOST run $APPNAME /app/deploy/dokku-reset-db.sh

To reset the db and load user data:

    export DATA=user-generated
    # run these commands one by one (they will not all run if pasted into the console together)
    ssh dokku@$DOKKU_HOST config:set $APPNAME DATA=$DATA
    # run these commands one by one (they will not all run if pasted into the console together)
    ssh dokku@$DOKKU_HOST run $APPNAME /app/deploy/dokku-reset-db.sh

To run the tests:

    # needs to be set appropriately (see above in readme)
    export COVERAGE=basic

    # use ci-configuration for deployment while running tests
    ssh dokku@$DOKKU_HOST config:set $APPNAME CONFIG_ENVIRONMENT=ci

    # run tests within a dokku app container
    ssh dokku@$DOKKU_HOST run $APPNAME /app/deploy/dokku-run-tests.sh $COVERAGE

    # restore config-environment
    ssh dokku@$DOKKU_HOST config:set $APPNAME CONFIG_ENVIRONMENT=$CMS_CONFIG_ENVIRONMENT

To upload the current user-generated data to S3, run:

    ssh dokku@$DOKKU_HOST run $APPNAME /app/shell-scripts/upload-user-data-backup.sh

### Set up an SSH tunnel to be able to access the deployed database locally

Make sure that your dokku ssh key has port forwarding enabled (A user with root access to the dokku hosts needs to log in and run the `dokku-user-allow-port-forwarding.sh` bash script once after your ssh key has been granted access to dokku).

Then, set up a ssh tunnel:

    ssh dokku@$DOKKU_HOST run $APPNAME /app/app/yiic config exportDbConfig --connectionID=db | tee /tmp/db-config.sh
    tr -d $'\r' < /tmp/db-config.sh > /tmp/db-config.clean.sh
    source /tmp/db-config.clean.sh
    # set-up ssh tunnel against dokku host to be able to access db instance
    ssh dokku@$DOKKU_HOST -v -N -L 43306:$DB_HOST:$DB_PORT &
    export DB_HOST=127.0.0.1
    export DB_PORT=43306
    # verify local db access
    echo "SELECT 1;" | mysql -h$DB_HOST -P$DB_PORT -u$DB_USER --password=$DB_PASSWORD $DB_NAME

## Deploy using Heroku

To build and deploy on dokku, push to a heroku repository:

    git push git@heroku.com:$APPNAME.git $CURRENT_BRANCH:master

You will also need to run the following once after the initial push:

    # set the cms host

    export CMS_HOST=$APPNAME.heroku.com

    # set the proper buildpack url

    heroku config:add BUILDPACK_URL=https://github.com/ddollar/heroku-buildpack-multi.git --app=$APPNAME

    # activate papertrail logging

    heroku addons:add papertrail --app=$APPNAME

    # connect a db instance

    heroku addons:add cleardb --app=$APPNAME
    heroku config:set --app=$APPNAME DATABASE_URL="`heroku config:get --app=$APPNAME CLEARDB_DATABASE_URL`"

    # set environment variables

    heroku config:set --app=$APPNAME ENVBOOTSTRAP_STRATEGY=environment-variables ENV=dokku/$APPNAME BRAND_SITENAME=Gapminder-CMS-$APPNAME BRAND_DOMAIN=$CMS_HOST DATA=$DATA GRANULARITY=$GRANULARITY USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY=$USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY USER_DATA_BACKUP_UPLOADERS_SECRET=$USER_DATA_BACKUP_UPLOADERS_SECRET USER_GENERATED_DATA_S3_BUCKET=$USER_GENERATED_DATA_S3_BUCKET PAPERTRAIL_PORT=$PAPERTRAIL_PORT

    # reset db and load user data if DATA=user-generated

    # todo

Note: Deploying using Heroku is currently not feasable. The app needs to be made read-only before it will work. For instance, p3media needs to be replaced with a fully network-based-solution.

## Config

This section describes the CMS [config](http://12factor.net/config).

All CMS entry scripts (currently `www/index.php` & `app/yiic`) should include a file called `envbootstrap.php` in order to make the current config available to the PHP code.

For more information, see `app/config/envbootstrap/README.md`

### Runtime configurations

#### ENVBOOTSTRAP_STRATEGY (default: local)

Type: Environment variable

This sets which of the app/config/envbootstrap/*/envbootstrap.php includes are used and can be one of the following:

* environment-variables - This contains an envbootstrap include that will set the environment constants according to the values of environment variables.
* local - This envbootstrap sets the constants directly (hard-coded). The `local/envbootstrap.dist.php` should be used as template, and the hard-coded `local/envbootstrap.php` ignored by git.
* self-detect - This envbootstrap includes all known deployments and their respective configs. The code will self-detect where it is running and set the environment constants accordingly.

Developers are encouraged to set this to `local`, but can also use `environment-variables` by setting the appropriate environment variables in the php-fpm or apache configuration, or by using a 12factor-based deployment system like dokku or heroku.

#### ENV

Type: PHP Constant

This should be a unique identifier of the current deployment. It is used in distributed error reporting to distinguish the source of the error.

#### DEV (default: `true`)

Type: PHP Constant

When true, this enables `YII_DEBUG` and sets display_errors to true.

#### DEBUG_REDIRECTS (default: `false`)

Type: PHP Constant

When true, Yii controller redirects are replaced with a page containing a link to the redirection target. Especially useful together with the DEBUG_LOGS directive.

#### DEBUG_LOGS (default: `false`)

Type: PHP Constant

When true, Yii application and profile logs show up at the end of the pages. (Currently inactivated until debug logs are inactivated for ajax and REST API requests)

#### CONFIG_ENVIRONMENT (default: `development`)

Type: Environment variable

This sets which of the app/config/environments/*.php configuration includes are used and can be one of the following:

* `ci` - Used while running acceptance tests (for instance, it disables captcha on the registration form)
* `development` - Used for development and production deployments
* `production` - From Phundament, currently unused
* `test` - From Phundament, currently unused
* `test-functional` - From Phundament, currently unused but will probably be used if we start with functional tests

#### DATA (default: `user-generated`)

Type: Environment variable

Sets the type of database contents the CMS will be seeded with when running `deploy/reset-db.sh` or `tests/reset-test-db.sh`.

* `clean-db` - A clean CMS installation with only an admin user.
* `user-generated` - User generated data is imported from S3.

For more information, read the [Staging/QA & CI/CD Set-up & Release-routines](https://docs.google.com/a/neam.se/document/d/1pPvB0lvtlCbeKGhjkFyWCnQl6Dn1m1QLgSMNxMwBPhY/edit?usp=sharing) document.

#### BRAND_SITENAME

Type: PHP Constant

The CMS site name.

#### BRAND_DOMAIN

Type: PHP Constant

The domain that external company-specific links should use, for instance when linking `Gapminder` in "CC by Gapminder".

#### DATABASE_URL or YII_DB_*-constants

Type: PHP Constant(s)

Determines what backing service to use for MySQL-compatible database access.

The relevant constants are:

 * YII_DB_SCHEME
 * YII_DB_HOST
 * YII_DB_USER
 * YII_DB_PASSWORD
 * YII_DB_NAME

Alternatively, database connection details can be supplied by setting the DATABASE_URL configuration directive in the format `mysql2://username:password@host:port/db`

Note: Developers are encouraged to use MAMP for easy MySQL set-up locally.

#### SMTP_URL or SMTP_*-constants

Type: PHP Constant(s)

Determines what backing service to use for mail sending.

The relevant constants are:

 * SMTP_HOST
 * SMTP_USERNAME
 * SMTP_PASSWORD
 * SMTP_PORT
 * SMTP_ENCRYPTION

Alternatively, SMTP details can be supplied by setting the SMTP_URL configuration directive in the format `smtp://username:urlencodedpassword@host:587?encryption=tls`

Note: Developers are encouraged to use Google's SMTP server with their own accounts: https://www.digitalocean.com/community/articles/how-to-use-google-s-smtp-server

#### YII_GII_PASSWORD

Type: PHP Constant

Used in Yii configuration to specify the password for Gii.

#### TEST_DB_*-constants

Type: PHP Constants

Determines what backing service to use for MySQL-compatible database access when developers run tests locally.

#### USER_GENERATED_DATA_S3_BUCKET

The S3 bucket where user generated data is stored.

#### USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY & USER_DATA_BACKUP_UPLOADERS_SECRET

S3 credentials for an IAM user that has read+write access to the USER_GENERATED_DATA_S3_BUCKET.

### Deployment configurations

#### COMPOSER_GITHUB_OAUTH_TOKEN

Type: Environment variable

As per https://devcenter.heroku.com/articles/php-support#custom-github-oauth-tokens

#### NEW_RELIC_LICENSE_KEY

Type: Environment variable

As per https://github.com/CHH/heroku-buildpack-php#newrelic

#### NEW_RELIC_APP_NAME

Type: Environment variable

As per http://docs.newrelic.com/docs/site/naming-your-application

#### GA_TRACKING_ID

Type: Environment variable

Google Analytics tracking id (UA-XXXXXXX-X)

#### SENTRY_DSN

Type: Environment variable

As per https://app.getsentry.com/gapminder-developers/gapminder-cms/keys/
