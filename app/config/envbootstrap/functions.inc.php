<?php

function setenv($ref, $default = null, $required = false)
{
    $value = getenv($ref);
    if (empty($value)) {
        if ($required) {
            throw new \Exception("Environment variable $ref needs to be non-empty. Adjust app configuration and re-build.");
        }
        $value = $default;
    }
    // Treat the strings "true" and "false" as booleans
    if ($value === "true") {
        $value = true;
    }
    if ($value === "false") {
        $value = false;
    }
    define($ref, $value);
}

function default_config_environment()
{
    $root = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';
    $default = is_file("$root/tests/testing") ? 'test' : 'production';
    return $default;
}