Gapminder School CMS
====================

This web application is used by the community as well as Gapminder staff to author, translate and publish the educational material.

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

A useful method while developing tests locally is pauseExecution(). It only has effect if tests are run with the "--debug" flag (as per above). It pauses the execution and let's you use developer tools or similar to inspect the current state of things. For instance, if you can't a selector to work, add it just before the problematic selector:

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

    # replace "replaceme" with valid S3 credentials to be able to import/export user-generated data (DATA=user-generated)

    export USER_GENERATED_DATA_S3_BUCKET="s3://user-data-backups"
    export USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY="replaceme"
    export USER_DATA_BACKUP_UPLOADERS_SECRET="replaceme"

    # connect a db instance

    ssh dokku@$DOKKU_HOST mariadb:create $APPNAME

    # set environment variables

    ssh dokku@$DOKKU_HOST config:set $APPNAME ENVBOOTSTRAP_STRATEGY=environment-variables ENV=dokku/$APPNAME BRAND_SITENAME=Gapminder-CMS-$APPNAME BRAND_DOMAIN=$CMS_HOST DATA=$DATA GRANULARITY=$GRANULARITY USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY=$USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY USER_DATA_BACKUP_UPLOADERS_SECRET=$USER_DATA_BACKUP_UPLOADERS_SECRET USER_GENERATED_DATA_S3_BUCKET=$USER_GENERATED_DATA_S3_BUCKET

    # add persistent folder to running container (not recommended dokku-practice, but necessary until p3media is replaced with a fully network-based-solution)

    export DOKKU_ROOT=/home/dokku
    ssh dokku@$DOKKU_HOST docker-options:add $APPNAME "-v $DOKKU_ROOT/$APPNAME/cache:/cache"

    # reset db and load user data if DATA=user-generated

    export DATA=clean-db
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

