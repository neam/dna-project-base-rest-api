<?php

$config = & $gcmsConfig;

if (DEBUG_LOGS) {

    ini_set('xdebug.collect_params', '1');
    ini_set('xdebug.var_display_max_depth', '4');

    $_levels = array(
        'flow',
        'stat',
        YII_DEBUG ? 'trace' : null,
        'error',
        'warning',
        'profile',
        'info',
        'inspection',
        'logdump',
        'qa-state',
        //'casperjs',
    );
    $levels = implode(', ', $_levels);
    if (isset($_GET['debug_extra_log_levels']) && !empty($_GET['debug_extra_log_levels'])) {
        // relevant log levels to add on the fly: verbose_inspection
        $levels .= ", " . $_GET['debug_extra_log_levels'];
    }

    $ajaxRequest = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest';

    $apiRequest = strpos($_SERVER['REQUEST_URI'], '/api/') !== false;

    $config["components"]["log"]["routes"][] = array(
        'class' => 'CWebLogRoute',
        'levels' => $levels, //trace,
        'enabled' => !$ajaxRequest && !$apiRequest,
    );

    /* Persistent logs */
    if (false) {
        $config["components"]["log"]["routes"][] = array(
            'class' => 'CDbLogRoute',
            'connectionID' => 'db',
            'logTableName' => 'yiilog_all'
        );
    }

    $config["components"]["db"]["enableParamLogging"] = true;
    if (!empty($_GET['db_profiling'])) {
        $config["components"]["db"]["enableProfiling"] = true;
    }

    $config["components"]["log"]["routes"][] = array(
        'class' => 'CProfileLogRoute',
        'levels' => 'trace, error, warning', //trace,
    );
}

