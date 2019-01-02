<?php

if (!empty($_POST)) {
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

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $result = $q->execute(array('username' => $username));
    $user = $q->fetch();

    if ($user) {
        $usernameDuplicateError = 'Dieser Nutzername wird bereits verwendet';
        $valid = false;
    }

    if ($valid) {

        $sql = "INSERT INTO users (username,email,password) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($username, $email, $password));
        Database::disconnect();

        header("Location: index.php");
    }
}
