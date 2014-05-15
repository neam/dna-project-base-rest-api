<?php

function setenv($ref, $default = null, $required = false)
{
    $value = getenv($ref);
    if ($value === false) {
        if ($required) {
            throw new \Exception("Environment variable $ref needs to be set. Adjust app configuration and re-build.");
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

