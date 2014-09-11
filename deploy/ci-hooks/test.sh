#!/bin/bash

# Script to test the deployed cms (currently to Dokku) during continuous integration (sourced)

# The following env vars needs to be set properly:
# - DRONE_BUILD_DIR
# - CMS_APPNAME
# - CMS_CONFIG_ENVIRONMENT
# - DOKKU_HOST
# - COVERAGE

# cd into tests
cd tests

# use ci-configuration for deployment while running tests
ssh dokku@$DOKKU_HOST config:set $CMS_APPNAME CONFIG_ENVIRONMENT=ci

# tests runs within a dokku app container
$DRONE_BUILD_DIR/ci-scripts/dokku-run-workaround.sh ssh dokku@$DOKKU_HOST run $CMS_APPNAME /app/deploy/dokku-run-tests.sh $COVERAGE

# restore config-environment
ssh dokku@$DOKKU_HOST config:set $CMS_APPNAME CONFIG_ENVIRONMENT=$CMS_CONFIG_ENVIRONMENT
