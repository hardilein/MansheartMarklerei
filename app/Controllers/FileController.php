<?php

if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}

function createDir($path) {
    $ret = false;
    if (!file_exists($path)) {
        mkdir($path);
        if (file_exists($path)) {
            $ret = true;
        }
    } else {
        $ret = true;
    }
    return $ret;
}

