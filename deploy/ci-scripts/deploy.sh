#!/bin/bash

# Script to deploy the cms (currently to Dokku) during continuous integration

# The following env vars needs to be set properly:
# - DRONE_BUILD_DIR
# - USER_GENERATED_DATA_S3_BUCKET
# - USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY
# - USER_DATA_BACKUP_UPLOADERS_SECRET
# - COMPOSER_GITHUB_TOKEN
# - SAUCE_USERNAME
# - SAUCE_ACCESS_KEY
# - NEW_RELIC_LICENSE_KEY
# - SMTP_URL
# - SENTRY_DSN
# - GA_TRACKING_ID
# - COMMIT_MESSAGE
# - BRANCH
# - CMS_APPNAME
# - CMS_HOST
# - CMS_CONFIG_ENVIRONMENT
# - DOKKU_HOST
# - TOPLEVEL_DOMAIN

export CI=1

APPNAME=$CMS_APPNAME
echo APPNAME=$APPNAME

set +o errexit; git checkout a-detached-head-wont-work || git checkout -b a-detached-head-wont-work; set -o errexit
git push dokku@$DOKKU_HOST:$APPNAME a-detached-head-wont-work:master -f

# at this stage the docker instance is prepared and runs the cms yii application.
# new applications however needs a database container created and some basic configuration set
# before the application actually works

# connect a db instance

ssh dokku@$DOKKU_HOST mariadb:create $APPNAME

# set environment variables

ssh dokku@$DOKKU_HOST config:set $APPNAME \
ENVBOOTSTRAP_STRATEGY=environment-variables \
ENV=dokku/$APPNAME \
BRAND_SITENAME=Gapminder-CMS-$APPNAME \
BRAND_DOMAIN=$CMS_HOST \
DATA=$DATA \
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
NGINX_VHOSTS_CUSTOM_CONFIGURATION=deploy/nginx.inc.conf

# add persistent folder to running container (not recommended dokku-practice, but necessary until p3media is replaced with a fully network-based-solution)

export DOKKU_ROOT=/home/dokku
ssh dokku@$DOKKU_HOST docker-options:add $APPNAME "-v $DOKKU_ROOT/$APPNAME/cache:/cache"

# reset db and load user data if DATA=user-generated
$DRONE_BUILD_DIR/ci-scripts/dokku-run-workaround.sh ssh dokku@$DOKKU_HOST run $APPNAME /app/deploy/dokku-reset-db.sh

echo "Build $APPNAME should now be available at http://$CMS_HOST"
