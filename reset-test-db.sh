set -x;

app/yiic databaseschema --connectionID=dbTest dropAllTables --verbose=1
app/yiic databaseschema --connectionID=dbTest loadSql --path=db/schema.sql --verbose=0
app/yiic migrate --connectionID=dbTest --interactive=0
