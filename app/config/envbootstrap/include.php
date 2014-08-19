<?php

// Include envbootstrap - see app/config/envbootstrap/README.md for more information
$envbootstrap_strategy = getenv('ENVBOOTSTRAP_STRATEGY');
if (empty($envbootstrap_strategy)) {
    error_log("ENVBOOTSTRAP_STRATEGY empty, defaulting to local");
    $envbootstrap_strategy = "local";
}
$envbootstrap = dirname(__FILE__) . '/' . $envbootstrap_strategy . '/envbootstrap.php';
if (!is_readable($envbootstrap)) {
    echo "Main envbootstrap file not available ($envbootstrap).";
    die(2);
}
require_once($envbootstrap);