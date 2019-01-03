<?php
if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}
require_once "./app/Controllers/UserController.php";


//Da UserController.php sich nicht nur um den Login kümmert, übergeben wir noch eine Methode
