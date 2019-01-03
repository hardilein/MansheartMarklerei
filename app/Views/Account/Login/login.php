<?php
if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}
require_once "./app/Controllers/UserController.php";
require_once './app/Data/DataContext.php';

//Da UserController.php sich nicht nur um den Login kümmert, übergeben wir noch eine Methode

if (isset($errorMessage)) {
    echo $errorMessage;
}
?>

<form action="index.php?v=Login"
          method="post">
    Username:<br>
    <input type="text"
           maxlength="250"
           name="username"><br><br>

    Dein Passwort:<br>
    <input type="password"
           maxlength="250"
           name="password"><br>

    <input type="submit"
           value="Abschicken">
</form>
