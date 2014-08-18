<?php
// Here you can initialize variables that will for your tests
$suite = "acceptance";

// Use helper classes from acceptance suit
\Codeception\Util\Autoload::registerSuffix('Steps', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'acceptance' . DIRECTORY_SEPARATOR . '_steps');
\Codeception\Util\Autoload::registerSuffix('Trait', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'acceptance' . DIRECTORY_SEPARATOR . '_steps');
\Codeception\Util\Autoload::registerSuffix('Page', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'acceptance' . DIRECTORY_SEPARATOR . '_pages');
