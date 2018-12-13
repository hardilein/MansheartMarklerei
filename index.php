
<?php
define('AccessConstant', TRUE);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./app/shared/main.css" />
</head>
<body>

<?php
//Routen Parameter als Query-String
if (!isset($_GET['v'])) {
    $view = "";
} else {
    $view = $_GET['v'];
}
if (!isset($_GET['id'])) {
    $unitId = 0;
} else {
    $unitId = $_GET['id'];
}

include "./app/shared/header.php";
// routing anhand übergebener werte
switch ($view) {
    case 'Immobilien':
        require_once "./app/Views/Immobilien/Alle/immo-alle.php";
        break;
    case 'cretae':
        require_once "./Client/bla.php";
        break;
    case 'cretae':
        require_once "./Client/bla.php";
        break;
    case 'cretae':
        require_once "./Client/bla.php";
        break;
    default:
        require_once "./app/Views/Account/index.php";
        break;
}
?>

</body>
</html>
