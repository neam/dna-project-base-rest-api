echo "This command is too dangerous to keep activated in git. To use this locally, comment out these exit line below, but DO NOT commit this shellscript in an activated form"
exit;

set -x;

app/yiic databaseschema --connectionID=db dropAllTablesAndViews --verbose=0
app/yiic databaseschema --connectionID=db loadSql --path=db/schema.sql --verbose=0
app/yiic migrate --connectionID=db --interactive=0
mkdir .trashed-p3media-data
mv app/data/p3media/* .trashed-p3media-data/
export connectionID=db
./_provision.sh

