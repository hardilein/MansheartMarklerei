<?php

if (!empty($_POST)) {
    // keep track validation errors
    $usernameError = null;
    $emailError = null;
    $passwordError = null;
    $rollenIdError = null;

    // keep track post values
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rollenId = $_POST['rollenId'];

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
    if (empty($rollenId)) {
        $rollenId = 'Bitte Nutzerrolle wählen';
        $valid = false;
    }

    if ($valid) {
        $pdo = Database::connect();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (username,email,password,rollenId) values(?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($username, $email, $password, $rollenId));
        Database::disconnect();
        header("Location: index.php");
    }
}
