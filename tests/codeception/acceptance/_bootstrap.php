<?php
// Here you can initialize variables that will for your tests
$suite = "acceptance";

\Codeception\Util\Autoload::registerSuffix('Steps', __DIR__.DIRECTORY_SEPARATOR.'_steps');
\Codeception\Util\Autoload::registerSuffix('Page', __DIR__.DIRECTORY_SEPARATOR.'_pages');