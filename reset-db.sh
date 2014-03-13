echo "This command is too dangerous to keep activated in git. To use this locally, comment out these exit line below, but DO NOT commit this shellscript in an activated form"
exit;

set -x;

app/yiic databaseschema dropAllTables --verbose=1
app/yiic databaseschema loadSql --path=db/schema.sql --verbose=0
app/yiic migrate --interactive=0
