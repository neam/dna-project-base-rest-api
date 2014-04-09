if [ "$connectionID" == "" ]; then
    connectionID=db
fi
chown -R www-data:www-data app/data/
chown -R www-data:www-data app/runtime/
chown -R www-data:www-data www/assets/
chown -R www-data:www-data www/runtime/
chmod -R g+rw app/data/
chmod -R g+rw app/runtime/
chmod -R g+rw www/assets/
chmod -R g+rw www/runtime/
# todo, fix envbootstrap before continuing
exit 0
app/yiic migrate --connectionID=$connectionID
app/yiic authorizationhierarchy reset
app/yiic authorizationhierarchy build
app/yiic databaseviewgenerator --connectionID=$connectionID item
app/yiic fixture --connectionID=$connectionID load
