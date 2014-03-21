<?php
// Here you can initialize variables that will for your tests
$suite = "acceptance";

$envbootstrap = dirname(__FILE__) . '/../../../../common/settings/envbootstrap.php';
if (!is_readable($envbootstrap)) {
    echo "Main envbootstrap file $envbootstrap not available.";
    die(2);
}
require_once($envbootstrap);

\Codeception\Util\Autoload::registerSuffix('Steps', __DIR__.DIRECTORY_SEPARATOR.'_steps');
\Codeception\Util\Autoload::registerSuffix('Page', __DIR__.DIRECTORY_SEPARATOR.'_pages');