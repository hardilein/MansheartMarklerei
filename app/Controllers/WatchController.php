<?php

if(!empty($_COOKIE["hab_watchlist"])){
    $watchlist = explode(",",$_COOKIE["hab_watchlist"]);
} else {
    $watchlist = [];
}

if(!empty($_GET['id'])){
    $id = $_GET['id'];
}
$action = $_GET['a'];

switch($action) {
    case 'add':
        array_push($watchlist, $id);
        setcookie("hab_watchlist", implode(",",$watchlist));
        break;
    case 'delete':
        $watchlist = array_diff($watchlist, array($id));
        setcookie("hab_watchlist", implode(",",$watchlist));
        break;
    case 'show':
        print_r ($watchlist);
        break;

}



