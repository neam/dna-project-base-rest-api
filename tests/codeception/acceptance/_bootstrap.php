<?php
// Here you can initialize variables that will for your tests
$suite = "acceptance";

\Codeception\Util\Autoload::registerSuffix('Steps', __DIR__.DIRECTORY_SEPARATOR.'_steps');
\Codeception\Util\Autoload::registerSuffix('Trait', __DIR__.DIRECTORY_SEPARATOR.'_steps');
\Codeception\Util\Autoload::registerSuffix('Page', __DIR__.DIRECTORY_SEPARATOR.'_pages');

// Make the name of the current environment available elsewhere (AppSteps).
// It is also provided in test-files using $this->env
$GLOBALS['running_env'] = $settings['current_environment'];
