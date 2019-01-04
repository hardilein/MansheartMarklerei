<?php
session_start();

$sitetitle = "";
$content = "";

require_once './app/Data/DataContext.php';
require_once "./app/Controllers/UserController.php";
require_once "./app/Controllers/WatchController.php";

//Routen-Parameter als Query-String
if (!isset($_GET['v'])) $view = "";
else $view = $_GET['v'];

// routing anhand übergebener Werte
switch ($view) {
    case 'Immobilien':
        $sitetitle = !isLoggedIn() ? "Alle Immobilien" : "Meine Immobilien";
        $content = "./app/Views/Immobilien/Alle/immo-alle.php";
        break;
    case 'Create':
        $sitetitle = "Immobilien hinzufügen";
        $content = "./app/Views/Immobilien/Edit/immo-edit.php";
        break;
    default:
        $sitetitle = !isLoggedIn() ? "Alle Immobilien" : "Meine Immobilien";
        $content =  "./app/Views/Immobilien/Alle/immo-alle.php";
        break;
}


