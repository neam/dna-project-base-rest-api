#!/bin/bash

echo "[default]
access_key = $USER_DATA_BACKUP_UPLOADERS_ACCESS_KEY
secret_key = $USER_DATA_BACKUP_UPLOADERS_SECRET" > /tmp/.s3cfg

exit 0