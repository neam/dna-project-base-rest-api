<?php

namespace gapminder\envbootstrap;

// ==== Initial environment bootstrap ====

define("ENV", 'local-foo');
define("DEV", true);
define("DEBUG_REDIRECTS", false);
define("DEBUG_LOGS", false);
define("CONFIG_ENVIRONMENT", 'development');

// ==== Identity-related constants ====

define("BRAND_SITENAME", 'Gapminder CMS Foo DEV');
define("BRAND_DOMAIN", 'gapminder.local');

// ==== Defines infrastructure = all backing services, usernames, api:s, servers, ports etc depending on environment ====

define("SMTP_HOST", '');
define("SMTP_PORT", '');
define("SMTP_TIMEOUT", '');
define("SMTP_ENCRYPTION", '');
define("SMTP_AUTH_USERNAME", '');
define("SMTP_AUTH_PASSWORD", '');

// Support setting main db constants based on DATABASE_URL environment variable
define("DATABASE_URL", null);

if (DATABASE_URL === null) {
    define("YII_DB_SCHEME", "mysql");
    define("YII_DB_HOST", "127.0.0.1");
    define("YII_DB_USER", "root");
    define("YII_DB_PASSWORD", "root");
    define("YII_DB_NAME", "gcms");
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

define("YII_GII_PASSWORD", "foo");

// ==== Define test-related constants ====

define("TEST_DB_NAME", 'gscms_test');
define("TEST_DB_USER", 'gcms_test');
define("TEST_DB_PASSWORD", 'gcms_test');
define("TEST_DB_HOST", YII_DB_HOST);

// ==== Define some dependent constants and/or settings ====

// General error reporting level
error_reporting(E_ALL);

if (DEV) {
    if (!defined('YII_DEBUG')) define('YII_DEBUG', true);
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
        $return->supportEmail = "info@" . $return->domain;
        $return->mailSentByMail = "noreply@" . $return->domain;
        $return->mailSentByName = $return->siteName;
    }
}


