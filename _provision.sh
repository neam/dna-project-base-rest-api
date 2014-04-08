set -x

npm install
bower install --allow-root
php composer.phar install

./post-buildstep.sh