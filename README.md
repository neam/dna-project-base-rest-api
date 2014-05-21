Gapminder School CMS
====================

This web application is used by the community as well as Gapminder staff to author, translate and publish the educational material.

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

When true, this enables `YII_DEBUG` (currently broken though) and sets display_errors to true.

#### DEBUG_REDIRECTS (default: `false`)

Type: PHP Constant

When true, Yii controller redirects are replaced with a page containing a link to the redirection target. Especially useful together with the DEBUG_LOGS directive.

#### DEBUG_LOGS (default: `false`)

Type: PHP Constant

When true, Yii application and profile logs show up at the end of the pages. (Currently inactivated until debug logs are inactivated for ajax and REST API requests)

#### CONFIG_ENVIRONMENT (default: `development`)

Type: Environment variable

This sets which of the app/config/env-*.php configuration includes are used and can be one of the following:

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

#### SENTRY_DSN

Type: Environment variable

As per https://app.getsentry.com/gapminder-developers/gapminder-cms/keys/

## Update to the latest changes

After pulling the latest changes, run the following to update your local environment:

    php composer.phar --prefer-source install
    npm install
    bower install
    shell-scripts/yiic-migrate.sh

## Tests

First, decide whether or not to run tests against a clean database or with user generated data:

    export DATA=clean-db
    OR
    export DATA=user-generated

Then, do the following before attempting to run any tests:

    cd tests
    php ../composer.phar install

    export CMS_HOST=localhost:31415
    ./generate-local-codeception-config.sh

To reset the test database (necessary in order to re-run tests):

    export CONFIG_ENVIRONMENT=test
    ./reset-test-db.sh

To run the unit tests:

    app/yiic mysqldump --connectionID=dbTest --dumpPath=tests/codeception/_data/
    vendor/bin/codecept run unit -g data:$DATA --debug

To run the functional tests:

    vendor/bin/codecept run functional -g data:$DATA --debug

For the remaining tests, you need to A. start the built in php server on port 31415 beforehand:

    ./_start-local-server.sh

B. have a selenium server running locally:

    # in another terminal window/tab
    java -jar selenium-server-standalone-2.41.0.jar

    # if above doesn't work, try specifying chromedriver explicitly
    java -jar selenium-server-standalone-2.41.0.jar -Dwebdriver.chrome.driver=./chromedriver

To run the acceptance suite:

    vendor/bin/codecept run acceptance --env=cms-local-chrome -g data:$DATA --debug

To run the the API suite:

    vendor/bin/codecept run api -g data:$DATA --debug

### Hints for test developers

To run an individual test, in this example an acceptance test:

     vendor/bin/codecept run acceptance --env=cms-local-chrome -g data:$DATA --debug 04-VerifyCleanDbCept.php

In general, consult the documentation at [http://codeception.com/docs/modules/WebDriver]() and related Codeception docs.

A useful method while developing tests locally is pauseExecution(). It only has effect if tests are run with the `--debug` flag (as per above). It pauses the execution and let's you use developer tools or similar to inspect the current state of things. For instance, if you can't a selector to work, add it just before the problematic selector:

    <?php
    $scenario->group('data:clean-db');
    $I = new WebGuy\MemberSteps($scenario);
    $I->wantTo('login and see result');
    $I->login('admin', 'admin');
    $I->pauseExecution(); // <-- here
    $I->see('Welcome to Gapminder', 'h4');

Happy test development!

## Deploy

Builds and runs with PHP 5.4.26, Nginx 1.4.3. However note that php cli runs version 5.4.6 (default Ubuntu Quantal).

Requires Dokku master branch and the following plugins:

 - For post-buildstep.sh to run properly - [https://github.com/musicglue/dokku-user-env-compile]()
 - For MySQL-compatible database access - [https://github.com/Kloadut/dokku-md-plugin]()
 - For mounting persistent cache directory at runtime - [https://github.com/dyson/dokku-docker-options]()

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
    export COMPOSER_GITHUB_OAUTH_TOKEN="replaceme"
    export NEW_RELIC_LICENSE_KEY="replaceme"
    export NEW_RELIC_APP_NAME="replaceme"
    export SMTP_URL="replaceme"
    export SENTRY_DSN="replaceme"

    ssh dokku@$DOKKU_HOST config:set $APPNAME \
    ENVBOOTSTRAP_STRATEGY=environment-variables \
    ENV=dokku/$APPNAME \
    BRAND_SITENAME=Gapminder-CMS-$APPNAME \
    BRAND_DOMAIN=$CMS_HOST \
    USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY=$USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY \
    USER_DATA_BACKUP_UPLOADERS_SECRET=$USER_DATA_BACKUP_UPLOADERS_SECRET \
    USER_GENERATED_DATA_S3_BUCKET=$USER_GENERATED_DATA_S3_BUCKET \
    CONFIG_ENVIRONMENT=$CMS_CONFIG_ENVIRONMENT \
    COMPOSER_GITHUB_OAUTH_TOKEN=$COMPOSER_GITHUB_OAUTH_TOKEN \
    NEW_RELIC_LICENSE_KEY=$NEW_RELIC_LICENSE_KEY \
    NEW_RELIC_APP_NAME=dokku/$APPNAME \
    SMTP_URL=$SMTP_URL \
    SENTRY_DSN=$SENTRY_DSN

    # add persistent folder to running container (not recommended dokku-practice, but necessary until p3media is replaced with a fully network-based-solution)

    export DOKKU_ROOT=/home/dokku
    ssh dokku@$DOKKU_HOST docker-options:add $APPNAME "-v $DOKKU_ROOT/$APPNAME/cache:/cache"

To reset the db to a clean state:

    export DATA=clean-db
    ssh dokku@$DOKKU_HOST config:set $APPNAME DATA=$DATA
    ssh dokku@$DOKKU_HOST run $APPNAME /app/deploy/reset-db.sh

To reset the db and load user data:

    export DATA=user-generated
    ssh dokku@$DOKKU_HOST config:set $APPNAME DATA=$DATA
    ssh dokku@$DOKKU_HOST run $APPNAME /app/deploy/reset-db.sh

To upload the current user-generated data to S3, run:

    ssh dokku@$DOKKU_HOST run $APPNAME /app/shell-scripts/upload-user-data-backup.sh

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

