<?php
session_start();

//Verbindung zur DB herstellen
$_SESSION["verbindung"] = verbindung();

$immos = getImmobilien();
var_dump($immos);
print_r($immos);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

?>
</body>
</html>

<?php
function verbindung()
{
    $_SESSION["verbindung"] = mysqli_connect('localhost', 'root', 'My102118910', 'mansheart');
    if (!$_SESSION["verbindung"]) {
        die("Connection failed!:" . mysqli_connect_error());
    }
    return $_SESSION["verbindung"];
}

function getImmobilien()
{

    $query = mysqli_query($_SESSION["verbindung"], "SELECT * FROM immobilien");

    $immos = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo json_encode($immos);

    return $immos;
}

?>

