set -x

if [ "$connectionID" == "" ]; then
    connectionID=db
fi

npm install
bower install --allow-root
php composer.phar install
rm -r www/assets/*
chown -R www-data:www-data app/data/
chown -R www-data:www-data app/runtime/
chown -R www-data:www-data www/assets/
chown -R www-data:www-data www/runtime/
chmod -R g+rw app/data/
chmod -R g+rw app/runtime/
chmod -R g+rw www/assets/
chmod -R g+rw www/runtime/
php app/yiic migrate --connectionID=$connectionID
php app/yiic authorizationhierarchy reset
php app/yiic authorizationhierarchy build
php app/yiic databaseviewgenerator --connectionID=$connectionID item
php app/yiic fixture --connectionID=$connectionID load
