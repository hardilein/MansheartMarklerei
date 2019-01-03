<?php

if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}

function rearrangeFilesArray($fa, $nested = false)
{
    // http://php.net/manual/de/features.file-upload.multiple.php
    $ret = array();
    if (isset($fa['name']) && is_array($fa['name'])) {
        $file_count = count($fa['name']);
        $file_keys = array_keys($fa);
        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $k) {
                $ret[$i][$k] = $fa[$k][$i];
            }
        }
    } else {
        foreach ($fa as $key => $val) {
            $arr = array();
            if (is_array($val['name'])) {
                $tmp = array();
                $file_count = count($val['name']);
                $file_keys = array_keys($val);

                for ($i = 0; $i < $file_count; $i++) {
                    foreach ($file_keys as $k) {
                        $tmp[$i][$k] = $val[$k][$i];
                    }
                }
                if ($nested === true) {
                    $arr[$key] = $tmp;
                } else {
                    $arr = array_merge($arr, $tmp);
                }
            } else {
                if ($nested === true) {
                    $arr[$key] = $val;
                } else {
                    $arr[] = $val;
                }
            }
            $ret = array_merge($ret, $arr);
        }
    }
    return $ret;
}

function createDir($path, $dirname)
{
    $ret = false;
    $pathanddirectory = $path . '/' . $dirname;
    if (!file_exists($pathanddirectory)) {
        echo "- Der Ordner \"$dirname\" existiert nicht.<br>";
        mkdir($pathanddirectory);
        if (file_exists($pathanddirectory)) {
            echo "- Der Ordner \"$dirname\" wurde erstellt.<br>";
            $ret = true;
        } else {
            echo "- Der Ordner \"$dirname\" konnte nicht erstellt werden.<br>";
        }
    } else {
        echo "- Der Ordner \"$dirname\" existiert bereits.<br>";
        $ret = true;
    }
    return $ret;
}

$send = (isset($_POST['send']) && !empty($_POST['send'])) ? $_POST['send'] : null;
if ($send) {
    if (count($_FILES) > 0) {
        $fies = rearrangeFilesArray($_FILES['myfile']);
        $uplstatus = createDir(__DIR__, 'uploads');
        if ($uplstatus) {
            $docstat = createDir(__DIR__, 'uploads/docs/');
            if ($docstat) {
                foreach ($fies as $file) {
                    move_uploaded_file($file['tmp_name'], __DIR__ . '/uploads/docs' . '/' . $file['name']);
                }
            }
        }
    }
}
