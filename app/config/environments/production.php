<?php

// merge this file in local.php on your production system

return array(
    // application components
    'components' => array(
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error,warning',
                ),
            ),
        ),
    ),
);