#!/bin/bash

script_path=`dirname $0`
cd $script_path/../

app/yiic mysqldump --dumpPath=db --dumpFile=current-schema.sql --data=false

# perform some clean-up on the dump file so that it needs to be committed less often
sed -i '/-- Dump completed on/d' db/current-schema.sql
sed -i 's/AUTO_INCREMENT=[0-9]*\b/\/\*AUTO_INCREMENT omitted\*\//' db/current-schema.sql

exit 0