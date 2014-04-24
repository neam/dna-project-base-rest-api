<?php
// Here you can initialize variables that will for your tests

// envbootstrap
require_once(dirname(__FILE__) . '/../envbootstrap-for-tests.php');

\Codeception\Util\Autoload::registerSuffix('Steps', __DIR__.DIRECTORY_SEPARATOR.'_steps');