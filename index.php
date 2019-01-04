<?php

define('AccessConstant', true);
session_start();

$sitetitle = "";
$content = "";

//Routen-Parameter als Query-String
if (!isset($_GET['v'])) $view = "";
else $view = $_GET['v'];

// routing anhand übergebener Werte
switch ($view) {
    case 'Immobilien':
        $sitetitle = "Alle Immobilien";
        $content = "./app/Views/Immobilien/Alle/immo-alle.php";
        break;
    case 'Create':
        $sitetitle = "Immobilien hinzufügen";
        $content = "./app/Views/Immobilien/Edit/immo-edit.php";
        break;
    default:
        $sitetitle = "Alle Immobilien";
        $content =  "./app/Views/Immobilien/Alle/immo-alle.php";
        break;
}


require_once './app/Data/DataContext.php';
require_once "./app/Controllers/UserController.php";
require_once "./app/Controllers/WatchController.php";



require_once "./app/Views/Layout/header.php";

require_once $content;

require_once "./app/Views/Layout/footer.php";

