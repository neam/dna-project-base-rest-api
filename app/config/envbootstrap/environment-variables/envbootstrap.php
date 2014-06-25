<?php

namespace gapminder\envbootstrap;

require(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'function.setenv.php');

// ==== Initial environment bootstrap ====

setenv("ENV", $default = null, $required = true);
setenv("DEV", $default = false);
setenv("DEBUG_REDIRECTS", $default = false);
setenv("DEBUG_LOGS", $default = false);
setenv("CONFIG_ENVIRONMENT", $default = 'development', $required = false); // Used in main-local.php and then in index.php to decide which env-*.php configuration file to include
setenv("DATA", $default = 'user-generated', $required = true);

// ==== CMS page ids ====
setenv("TERMS_PAGE_ID", $default = 1, $required = false);
setenv("ABOUT_PAGE_ID", $default = 2, $required = false);
setenv("CC_PAGE_ID", $default = 3, $required = false);
setenv("PRIVACY_POLICY_PAGE_ID", $default = 4, $required = false);

// ==== Identity-related constants ====

setenv("BRAND_SITENAME", $default = null, $required = true);
setenv("BRAND_DOMAIN", $default = null, $required = true);

// ==== Defines infrastructure = all backing services, usernames, api:s, servers, ports etc depending on environment ====

// Support setting main db constants based on DATABASE_URL environment variable
setenv("DATABASE_URL", $default = null, $required = false);
if (DATABASE_URL === null) {
    setenv("YII_DB_SCHEME", $default = 'mysql', $required = false);
    setenv("YII_DB_HOST", $default = null, $required = true);
    setenv("YII_DB_USER", $default = null, $required = true);
    setenv("YII_DB_PASSWORD", $default = null, $required = true);
    setenv("YII_DB_NAME", $default = null, $required = true);
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

// Require setting smtp constants based on SMTP_URL environment variable
setenv("SMTP_URL", $default = null, $required = true); // smtp://username:password@host:587?encryption=tls

$url = parse_url(SMTP_URL);
isset($url['query']) && parse_str($url['query'], $args);
define("SMTP_HOST", $url['host']);
define("SMTP_PORT", $url['port']);
define("SMTP_USERNAME", $url['user']);
define("SMTP_PASSWORD", urldecode($url['pass']));
define("SMTP_ENCRYPTION", isset($args['encryption']) ? $args['encryption'] : false);

setenv("SENTRY_DSN", $default = null, $required = true);
setenv("GA_TRACKING_ID", $default = null, $required = true);

// ==== Define test-related constants ====

setenv("TEST_DB_NAME", $default = YII_DB_NAME . '_test', $required = false);
setenv("TEST_DB_USER", $default = YII_DB_USER . '_test', $required = false);
setenv("TEST_DB_PASSWORD", $default = YII_DB_USER . '_test', $required = false);
setenv("TEST_DB_HOST", $default = YII_DB_HOST, $required = false);

// ==== Misc ====

setenv("YII_GII_PASSWORD", $default = uniqid(), $required = false);

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
        $return->signupEmail = "community@" . $return->domain;
        // Temporarily hard-coding to dev@gapminder.org since we don't have production status for Amazon Simple Email Services yet and the sender email needs to be verified in the sandbox
        $return->mailSentByMail = "dev@gapminder.org";
        //$return->mailSentByMail = "noreply@" . $return->domain;
        $return->mailSentByName = $return->siteName;
        return $return;
    }
}


