#!/bin/bash

# install s3cmd
wget -O- -q http://s3tools.org/repo/deb-all/stable/s3tools.key | sudo apt-key add -
sudo wget -O/etc/apt/sources.list.d/s3tools.list http://s3tools.org/repo/deb-all/stable/s3tools.list
sudo apt-get update && sudo apt-get install s3cmd

if [ ! -f ~/.s3cfg ]; then
    echo "[default]
access_key = $USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY
secret_key = $USER_DATA_BACKUP_UPLOADERS_SECRET" > ~/.s3cfg
fi

exit 0