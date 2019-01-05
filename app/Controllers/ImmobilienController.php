<?php

if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}





if(!empty($_POST) && isset($_POST['create'])) {
    saveImmobilie();
}

function getAllImmobilien() {
    global $pdo;
    $q = $pdo->prepare("SELECT * FROM immobilien AS i LEFT JOIN users AS u ON i.userid = u.id ORDER BY i.id DESC");
    $q->execute();
    return $q->fetchAll();
}


function getAllImmobilienByUserId($id) {
    global $pdo;
    $q = $pdo->prepare("SELECT * FROM immobilien AS i LEFT JOIN users AS u ON i.userid = u.id WHERE i.userid = :userid ORDER BY i.id DESC");
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


function saveImmobilie() {

    try {
        global $pdo;
        $q = $pdo->prepare("INSERT INTO immobilien(userid, name, size, nr_rooms, nr_floors, yearofconstruction, description) VALUES(?,?,?,?,?,?,?)");
        try {
            $q->execute(
                array(
                    $_SESSION['userid'],
                    $_POST['name'],
                    $_POST['size'],
                    $_POST['nr_rooms'],
                    $_POST['nr_floors'],
                    $_POST['yearofconstruction'],
                    $_POST['description']
                )
            );
            $lastInsertId = $pdo->lastInsertId();
        } catch(PDOExecption $e) {
            print "Error!: " . $e->getMessage() . "</br>";
        }
    } catch( PDOExecption $e ) {
        print "Error!: " . $e->getMessage() . "</br>";
    }





}