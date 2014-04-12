#!/bin/bash

set -x

if [ "$connectionID" == "" ]; then
    connectionID=db
fi
chown -R www-data:www-data app/data/
chown -R www-data:www-data app/runtime/
chown -R www-data:www-data www/assets/
chown -R www-data:www-data www/runtime/
chmod -R g+rw app/data/
chmod -R g+rw app/runtime/
chmod -R g+rw www/assets/
chmod -R g+rw www/runtime/

# temporarily
chmod -R 777 app/data/
chmod -R 777 app/runtime/
chmod -R 777 www/assets/
chmod -R 777 www/runtime/

# todo: move to php/node.js buildstep
bower install # --allow-root

rm -r www/assets/*

app/yiic fixture --connectionID=$connectionID load
app/yiic migrate --connectionID=$connectionID --interactive=0
app/yiic databaseviewgenerator --connectionID=$connectionID item

app/yiic authorizationhierarchy reset
app/yiic authorizationhierarchy build

exit 0