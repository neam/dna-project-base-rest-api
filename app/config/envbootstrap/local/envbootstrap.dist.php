<?php

namespace gapminder\envbootstrap;

require(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'functions.inc.php');

// ==== Initial environment bootstrap ====

define("ENV", 'local-foo');
define("DEV", false);
define("DEBUG_REDIRECTS", false);
define("DEBUG_LOGS", false);
setenv("CONFIG_ENVIRONMENT", $default = default_config_environment(), $required = false); // Used in main-local.php and then in index.php to decide which env-*.php configuration file to include
setenv("DATA", $default = 'clean-db', $required = false);

// ==== CMS page ids ====
setenv("TERMS_PAGE_ID", $default = 1, $required = false);
setenv("ABOUT_PAGE_ID", $default = 2, $required = false);
setenv("CC_PAGE_ID", $default = 3, $required = false);
setenv("PRIVACY_POLICY_PAGE_ID", $default = 4, $required = false);

// ==== Identity-related constants ====

define("BRAND_SITENAME", 'Gapminder CMS Foo DEV');
define("BRAND_DOMAIN", 'gapminder.local');

// ==== Defines infrastructure = all backing services, usernames, api:s, servers, ports etc depending on environment ====

// Different hosts based on running from inside docker container or locally
if (substr(getcwd(), 0, 5) == "/code") {
    define("LOCAL_SERVICES_IP", "172.17.42.1");
} else {
    define("LOCAL_SERVICES_IP", "127.0.0.1");
}

// Support setting main db constants based on DATABASE_URL environment variable
define("DATABASE_URL", null);

if (DATABASE_URL === null) {
    define("YII_DB_SCHEME", "mysql");
    define("YII_DB_HOST", LOCAL_SERVICES_IP);
    define("YII_DB_PORT", "13306");
    define("YII_DB_USER", "root");
    define("YII_DB_PASSWORD", "changeme");
    define("YII_DB_NAME", "db");
} else {
    // get the environment variable and parse it:
    $url = parse_url(DATABASE_URL);
    define("YII_DB_SCHEME", $url['scheme']);
    define("YII_DB_HOST", $url['host']);
    define("YII_DB_PORT", $url['port']);
    define("YII_DB_USER", $url['user']);
    define("YII_DB_PASSWORD", $url['pass']);
    define("YII_DB_NAME", trim($url['path'], '/'));
}

// Mailcatcher is used as SMTP while running tests
define("MAILCATCHER_HOST", LOCAL_SERVICES_IP);
define("MAILCATCHER_HTTP_PORT", "1080");
define("MAILCATCHER_SMTP_PORT", "1025");

// Support setting smtp constants based on SMTP_URL environment variable - Format: smtp://username:urlencodedpassword@host:587?encryption=tls
define("SMTP_URL", null);

if (SMTP_URL === null) {
    // Mailcatcher is used for local SMTP by default
    define("SMTP_HOST", MAILCATCHER_HOST);
    define("SMTP_USERNAME", null);
    define("SMTP_PASSWORD", null);
    define("SMTP_PORT", MAILCATCHER_SMTP_PORT);
    define("SMTP_ENCRYPTION", null);
    // Note: To send real emails locally devs can use Google's SMTP server with their own accounts: https://www.digitalocean.com/community/articles/how-to-use-google-s-smtp-server
    /*
    define("SMTP_HOST", "smtp.gmail.com");
    define("SMTP_USERNAME", "foo");
    define("SMTP_PASSWORD", "bar");
    define("SMTP_PORT", "587");
    define("SMTP_ENCRYPTION", "tls");
     */
} else {
    // get the environment variable and parse it:
    $url = parse_url(SMTP_URL);
    isset($url['query']) && parse_str($url['query'], $args);
    define("SMTP_HOST", $url['host']);
    define("SMTP_PORT", $url['port']);
    define("SMTP_USERNAME", $url['user']);
    define("SMTP_PASSWORD", urldecode($url['pass']));
    define("SMTP_ENCRYPTION", isset($args['encryption']) ? $args['encryption'] : false);
}

define("SENTRY_DSN", "https://foo:bar@app.getsentry.com/00000");
define("GA_TRACKING_ID", "UA-XXXXXXX-X");

// ==== Define test-related constants ====

define("TEST_DB_NAME", YII_DB_NAME . '_test');
define("TEST_DB_USER", YII_DB_USER);
define("TEST_DB_PASSWORD", YII_DB_PASSWORD);
define("TEST_DB_PORT", YII_DB_PORT);
define("TEST_DB_HOST", YII_DB_HOST);

// ==== Misc ====

define("YII_GII_PASSWORD", "foo");

// ==== Define some dependent constants and/or settings ====

// General error reporting level
error_reporting(E_ALL);

if (DEV) {
    if (!defined('YII_DEBUG')) define('YII_DEBUG', true);
    if (!defined('YII_TRACE_LEVEL')) define('YII_TRACE_LEVEL', 3);
    ini_set("display_errors", true);
} else {
    if (!defined('YII_DEBUG')) define('YII_DEBUG', false);
    ini_set("display_errors", false);
}

class Identity
{
    static public function brand()
    {
        $return = new \stdClass();
        $return->siteName = BRAND_SITENAME;
        $return->domain = BRAND_DOMAIN;
        $return->supportEmail = 'community@gapminder.org';
        $return->signupEmail = 'community@gapminder.org';
        $return->mailSentByMail = "community@gapminder.org";
        $return->mailSentByName = $return->siteName;
        return $return;
    }
}


