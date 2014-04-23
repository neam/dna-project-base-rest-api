Gapminder School CMS
====================

Builds and runs with PHP 5.4.26, Nginx 1.4.3. However note that php cli runs version 5.4.6 (default Ubuntu Quantal).

Requires Dokku master branch and the following plugins:
- For post-buildstep.sh to run properly - https://github.com/musicglue/dokku-user-env-compile
- For MySQL-compatible database access - https://github.com/Kloadut/dokku-md-plugin
- For mounting persistent cache directory at runtime - https://github.com/dyson/dokku-docker-options
