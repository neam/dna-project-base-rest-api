Gapminder School CMS
====================

Builds and runs with PHP 5.4.26, Nginx 1.4.3. However note that php cli runs version 5.4.6 (default Ubuntu Quantal).

Requires Dokku master branch and the following plugins:

 - For post-buildstep.sh to run properly - [https://github.com/musicglue/dokku-user-env-compile]()
 - For MySQL-compatible database access - [https://github.com/Kloadut/dokku-md-plugin]()
 - For mounting persistent cache directory at runtime - [https://github.com/dyson/dokku-docker-options]()

## Deploy

To build and deploy on dokku, first set fundamental config vars:

    export APPNAME=foo1-cms
    export DOKKU_HOST=dokku.gapminder.org

Then, push to a dokku repository:

    export CURRENT_BRANCH=develop
    git push dokku@$DOKKU_HOST:$APPNAME $CURRENT_BRANCH:master

You will also need to run the following once after the initial push:

    export USER_GENERATED_DATA_S3_BUCKET="s3://user-data-backups"
    export USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY="replacme"
    export USER_DATA_BACKUP_UPLOADERS_SECRET="replaceme"
    export CMS_HOST=$APPNAME.gapminder.org
    export PAPERTRAIL_PORT=49555

    # connect a db instance

    ssh dokku@$DOKKU_HOST mariadb:create $APPNAME

    # set environment variables

    ssh dokku@$DOKKU_HOST config:set $APPNAME ENVBOOTSTRAP_STRATEGY=environment-variables ENV=dokku/$APPNAME BRAND_SITENAME=Gapminder-CMS-$APPNAME BRAND_DOMAIN=$CMS_HOST DATA=$DATA GRANULARITY=$GRANULARITY USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY=$USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY USER_DATA_BACKUP_UPLOADERS_SECRET=$USER_DATA_BACKUP_UPLOADERS_SECRET USER_GENERATED_DATA_S3_BUCKET=$USER_GENERATED_DATA_S3_BUCKET PAPERTRAIL_PORT=$PAPERTRAIL_PORT

    # add persistent folder to running container (not recommended dokku-practice, but necessary until p3media is replaced with a fully network-based-solution)

    export DOKKU_ROOT=/home/dokku
    ssh dokku@$DOKKU_HOST docker-options:add $APPNAME "-v $DOKKU_ROOT/$APPNAME/cache:/cache"

    # reset db and load user data if DATA=user-generated

    export DATA=clean-db
    export DATA=user-generated
    ssh dokku@$DOKKU_HOST run $APPNAME /app/deploy/reset-db.sh

To upload the current user-generated data to S3, run:

    ssh dokku@$DOKKU_HOST run $APPNAME /app/shell-scripts/upload-user-data-backup.sh
