<?php

if(!empty($_COOKIE["hab_watchlist"])){
    $watchlist = explode(",",$_COOKIE["hab_watchlist"]);
} else {
    $watchlist = [];
}

if(isset($_GET['v']) && $_GET['v'] == "Watch") {

    if(!empty($_GET['id']))
        $id = $_GET['id'];

    if(!empty($_GET['a']))
        $action = $_GET['a'];

    switch($action) {
        case 'add':
            addToWatchList($id);
            break;
        case 'delete':
            deleteFromWatchList($id);
            break;
        default:
            break;
    }

}

function addToWatchList($id) {
    global $watchlist;
    if(!isInWatchList($id)) {
        array_push($watchlist, $id);
        setcookie("hab_watchlist", implode(",", $watchlist));
    }
}

function deleteFromWatchList($id) {
    global $watchlist;
    $watchlist = array_diff($watchlist, array($id));
    setcookie("hab_watchlist", implode(",",$watchlist));
}

function isInWatchList($id) {
    global $watchlist;
    return in_array($id, $watchlist);
}

function getWatchlistCount() {
    global $watchlist;
    return count($watchlist);
}

