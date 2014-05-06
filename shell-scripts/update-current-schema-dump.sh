#!/bin/bash

script_path=`dirname $0`
cd $script_path/../

app/yiic mysqldump
mv db/dump.sql db/current-schema.sql

exit 0