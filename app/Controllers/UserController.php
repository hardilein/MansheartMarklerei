<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    switch ($_GET["v"]) {
        case 'Registrieren':
            register();
            break;
        case 'Login':
            login();
            break;
        case 'Logout':
            logout();
            break;
    }

}

function login()
{
    session_destroy();
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $result = $q->execute(array('username' => $username));
    $user = $q->fetch();
    //print_r($user);
    //Überprüfung des

    if ($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        //die('Login erfolgreich. Weiter zu <a href="index.php">internen Bereich</a>');
        header("Location: index.php");
        exit();
    } else {
        $errorMessage = "Nutzername oder password war ungültig<br>";
    }

}

function register()
{
    //Validierungfehler tracken
    $usernameError = null;
    $usernameDuplicateError = null;
    $emailError = null;
    $passwordError = null;
    $rollenIdError = null;

    // übergebene Werte
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION["fields"]["username"] = $username;
    $_SESSION["fields"]["email"] = $email;

    $errorfields = "";

    // Eingabe Validierung
    $valid = true;
    if (empty($username)) {
        $usernameError = 'Bitte Namen eingeben';
        $errorfields .= "Username leer<br />";
        $valid = false;
    }

    if (empty($email)) {
        $errorfields .= "E-Mail leer<br />";
        $emailError = 'Bitte E-Mail eingeben';
        $valid = false;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = 'Bitte Überprüfen Sie ihre Eingabe';
            $errorfields .= "E-Mail überprüfen<br />";
            $valid = false;
        }
    }

    if (empty($password)) {
        $errorfields .= "Password leer<br />";
        $passwordError = 'Bitte password eingeben';
        $valid = false;
    }
    // auf bereits vorhandenen Nutzernamen prüfen

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $result = $q->execute(array('username' => $username));
    $user = $q->fetch();

    if ($user) {
        $usernameDuplicateError = 'Dieser Nutzername wird bereits verwendet';
        $errorfields .= "Username wird bereits verwendet<br />";
        $valid = false;
    }

    // validierte Eingaben persistieren
    if ($valid) {
        $message="Sie sind erfolgreich registriert";
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username,email,password) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($username, $email, $password_hash));
        Database::disconnect();
        
        header("Location: index.php?message=". $message ."#open-modal-register");
        unset($_SESSION['fields']);
        exit();
    } else {
        $errormessage = "Bitte überprüfen Sie die Felder:<br />" . $errorfields;
        header("Location: index.php?errormessage=". $errormessage ."#open-modal-register");
        exit();
    }
}

function logout()
{

    session_start();
    session_destroy();

    echo "Logout erfolgreich";

}
