<?php

// http://stackoverflow.com/questions/911158/how-to-clear-apc-cache-entries

var_dump($_SERVER['REMOTE_ADDR']);
if (in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '192.168.59.3'))) {
    apc_clear_cache();
    apc_clear_cache('user');
    apc_clear_cache('opcode');
    echo json_encode(array('success' => true));
} else {
    die('SUPER TOP SECRET');
}