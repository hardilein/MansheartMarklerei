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
    //DEBUG
    echo ("Login Called");

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $result = $q->execute(array('username' => $username));
    $user = $q->fetch();
    print_r($user);
    //Überprüfung des Passworts
    if ($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        die('Login erfolgreich. Weiter zu <a href="index.php">internen Bereich</a>');
    } else {
        $errorMessage = "Nutzername oder Passwort war ungültig<br>";
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

    // Eingabe Validierung
    $valid = true;
    if (empty($username)) {
        $usernameError = 'Bitte Namen eingeben';
        $valid = false;
    }

    if (empty($email)) {
        $emailError = 'Bitte E-Mail eingeben';
        $valid = false;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = 'Bitte Überprüfen Sie ihre Eingabe';
            $valid = false;
        }
    }

    if (empty($password)) {
        $passwordError = 'Bitte Passwort eingeben';
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
        $valid = false;
    }

    // validierte Eingaben persistieren
    if ($valid) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username,email,password) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($username, $email, $passwort_hash));
        Database::disconnect();

        header("Location: index.php");
    }
}

function logout()
{

    session_start();
    session_destroy();

    echo "Logout erfolgreich";

}
