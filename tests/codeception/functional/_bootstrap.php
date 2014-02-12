<?php
// Here you can initialize variables that will for your tests

$envbootstrap = dirname(__FILE__) . '/../../../../../common/settings/envbootstrap.php';
if (!is_readable($envbootstrap)) {
    echo "Main envbootstrap file not available.";
    die(2);
}
require_once($envbootstrap);
