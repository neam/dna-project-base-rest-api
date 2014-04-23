#!/bin/bash

set -x;

script_path=`dirname $0`

export connectionID=dbTest

app/yiic databaseschema --connectionID=$connectionID dropAllTablesAndViews --verbose=0
app/yiic databaseschema --connectionID=$connectionID loadSql --path=db/schema.sql --verbose=0
app/yiic fixture --connectionID=$connectionID load
app/yiic migrate --connectionID=$connectionID --interactive=0 # > /dev/null
app/yiic databaseviewgenerator --connectionID=$connectionID item

app/yiic mysqldump-dbTest