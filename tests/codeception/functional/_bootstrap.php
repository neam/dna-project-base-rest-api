<?php
// Here you can initialize variables that will for your tests

$envbootstrap = dirname(__FILE__) . '/../../../../common/settings/envbootstrap.php';
if (!is_readable($envbootstrap)) {
    echo "Main envbootstrap file $envbootstrap not available.";
    die(2);
}
require_once($envbootstrap);

\Codeception\Util\Autoload::registerSuffix('Steps', __DIR__.DIRECTORY_SEPARATOR.'_steps');