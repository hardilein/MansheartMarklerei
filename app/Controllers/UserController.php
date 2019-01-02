<?php
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($_POST)) {

//DEBUG:
    print_r($_POST);

    switch ($_POST["method"]) {
        case 'register':
            register();
            break;
        case 'login':
            login();
            break;
    }

}

function login()
{
    if (isset($_GET['login'])) {
        $email = $_POST['email'];
        $passwort = $_POST['passwort'];

        $q = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $q->execute(array('email' => $email));
        $user = $q->fetch();

        //Überprüfung des Passworts
        if ($user !== false && password_verify($passwort, $user['passwort'])) {
            $_SESSION['userid'] = $user['id'];
            die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
        } else {
            $errorMessage = "E-Mail oder Passwort war ungültig<br>";
        }
    }
}

function register()
{
    // keep track validation errors
    $usernameError = null;
    $usernameDuplicateError = null;
    $emailError = null;
    $passwordError = null;
    $rollenIdError = null;

    // keep track post values
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // validate input
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

    $q = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $result = $q->execute(array('username' => $username));
    $user = $q->fetch();

    if ($user) {
        $usernameDuplicateError = 'Dieser Nutzername wird bereits verwendet';
        $valid = false;
    }

    if ($valid) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username,email,password) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($username, $email, $passwort_hash));
        Database::disconnect();

        header("Location: index.php");
    }
}
