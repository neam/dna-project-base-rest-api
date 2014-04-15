#!/bin/bash

set -x;

app/yiic databaseschema --connectionID=db dropAllTablesAndViews --verbose=0
app/yiic databaseschema --connectionID=db loadSql --path=db/schema.sql --verbose=0
app/yiic fixture --connectionID=db load
app/yiic migrate --connectionID=db --interactive=0
app/yiic databaseviewgenerator --connectionID=db item

rm -rf app/data/p3media/*
# todo: find a way to ensure that previously uploaded media can be restored from, possible similar to below but that works more than once
#mkdir .trashed-p3media-data
#mv app/data/p3media/* .trashed-p3media-data/

