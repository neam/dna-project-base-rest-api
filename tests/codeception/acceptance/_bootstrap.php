<?php
// Here you can initialize variables that will for your tests
$suite = "acceptance";

// envbootstrap
require_once(dirname(__FILE__) . '/../envbootstrap-for-tests.php');

\Codeception\Util\Autoload::registerSuffix('Steps', __DIR__.DIRECTORY_SEPARATOR.'_steps');
\Codeception\Util\Autoload::registerSuffix('Page', __DIR__.DIRECTORY_SEPARATOR.'_pages');