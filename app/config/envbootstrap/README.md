Environment Bootstrap
=====================

A framework-agnostic approach to make the current [config](http://12factor.net/config) available to PHP applications.

All app entry scripts should include a file called `envbootstrap.php` in the following manner:

    // Include envbootstrap
    $envbootstrap_strategy = getenv('ENVBOOTSTRAP_STRATEGY');
    if (empty($envbootstrap_strategy)) {
        Yii::log("ENVBOOTSTRAP_STRATEGY empty, defaulting to local", CLogger::LEVEL_INFO);
        $envbootstrap_strategy = "local";
    }
    $envbootstrap = dirname(__FILE__) . '/envbootstrap/' . $envbootstrap_strategy . '/envbootstrap.php';
    if (!is_readable($envbootstrap)) {
        echo "Main envbootstrap file not available ($envbootstrap).";
        die(2);
    }
    require_once($envbootstrap);

This will make a series of PHP Constants available for use by the application wherever it may be fit, for instance in the PHP application's configuration files.

### Environment variables used by snippet

#### ENVBOOTSTRAP_STRATEGY (default: local)

Type: Environment variable

This sets which of the app/config/envbootstrap/*/envbootstrap.php includes are used and can be one of the following:

* environment-variables - This contains an envbootstrap include that will set the environment constants according to the values of environment variables.
* local - This envbootstrap sets the constants directly (hard-coded). The `local/envbootstrap.dist.php` should be used as template, and the hard-coded `local/envbootstrap.php` ignored by git.
* self-detect - This envbootstrap includes all known deployments and their respective configs. The code will self-detect where it is running and set the environment constants accordingly.

Developers using MAMP or similar will default to use "local", but can choose to use "environment-variables" by setting the appropriate environment variables in the php-fpm or apache configuration, or by using a 12factor-based deployment system like dokku or heroku.

