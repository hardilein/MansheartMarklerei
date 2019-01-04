<?php

if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}


function getAllImmobilien() {
    global $pdo;
    $q = $pdo->prepare("SELECT * FROM immobilien ORDER BY id DESC");
    $q->execute();
    return $q->fetchAll();
}

function getAllImmobilienByUserId($id) {
    global $pdo;
    $q = $pdo->prepare("SELECT * FROM immobilien WHERE  userid = ? ORDER BY id DESC");
    $q->execute(array('userid'=>$id));
    return $q->fetchAll();
}

function getAllImmobilienInWatchList($watchlist) {
//    global $pdo;
//    $q = $pdo->prepare("SELECT * FROM immobilien WHERE userid = ? ORDER BY id DESC");
//    $q->execute(array('userid'=>$id));
//    return $q->fetchAll();
}

function getImmobilieById($id) {
//    global $pdo;
//    $q = $pdo->prepare("SELECT * FROM immobilien WHERE  userid = ? ORDER BY id DESC");
//    $q->execute(array('userid'=>$id));
//    return $q->fetchOne();
}
