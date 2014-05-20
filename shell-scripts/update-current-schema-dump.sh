#!/bin/bash

script_path=`dirname $0`
cd $script_path/../

app/yiic mysqldump --dumpPath=db --dumpFile=current-schema.sql --data=false

exit 0