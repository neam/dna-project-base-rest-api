#!/bin/bash

set -x

npm install
bower install --allow-root
php composer.phar install
rm -r www/assets/*

./post-buildstep.sh