#!/bin/bash

set -x

if [ "$connectionID" == "" ]; then
    connectionID=db
fi
chown -R nobody: app/data/
chown -R nobody: app/runtime/
chown -R nobody: www/assets/
chown -R nobody: www/runtime/
chmod -R g+rw app/data/
chmod -R g+rw app/runtime/
chmod -R g+rw www/assets/
chmod -R g+rw www/runtime/

# temporarily until it is found enough to only set the user to nobody
chmod -R 777 app/data/
chmod -R 777 app/runtime/
chmod -R 777 www/assets/
chmod -R 777 www/runtime/

# todo: move to php/node.js buildstep
# bower install # --allow-root

rm -r www/assets/*

# necessary for user data backup uploads
deploy/install-s3cmd.sh

# make sure that app/data/p3media is a symlink to persistent /cache/p3media already in the build
if [ -d app/data/p3media ] ; then
    mv app/data/p3media app/data/.p3media-directory-before-symlinking
fi
if [ ! -L app/data/p3media ] ; then
    ln -s /cache/p3media app/data/p3media
fi

if [ ! "$ENV" == "" ]; then

    app/yiic fixture --connectionID=$connectionID load
    shell-scripts/yiic-migrate.sh --connectionID=$connectionID --interactive=0
    app/yiic databaseviewgenerator --connectionID=$connectionID item

fi

exit 0