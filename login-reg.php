<?php
session_start();

//Verbindung zur DB herstellen
$_SESSION["verbindung"] = verbindung();

//Wenn Eingabe in allen Feldern
if(!empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["passkey"])){



    if (!empty($_POST["email"])) {
        $email = mysqli_real_escape_string($_SESSION["verbindung"], $_POST["email"]);
    }
    else {
        $emailtest = test_input($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $email_error = "OPS";
        }
    }


    //Wenn Nutzername bereits belegt (im Array der Nutzer vorhanden) Abbruch
    $allenutzer = nutzerarray();
    if (!in_array($_POST["username"], $allenutzer)) {
        $username = mysqli_real_escape_string($_SESSION["verbindung"], $_POST["username"]);
    }
    else {
        $nutzerbesetzt = "The entered Username is already used by someone else!";
            $warnung = "1";
    }

    //Wenn das Email nicht email ist


    //Wenn Passwörter nicht übereinstimmen Abbruch
    if ($_POST["password"] == $_POST["passwortprüf"]) {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }
    else {
        $keineübereinstimmung = "The entered passwords don't match!";
        $warnung = "1";
    }

    //Wenn Schulkennwort falsch Abbruch
    if ($_POST["passkey"] == "moin") {
        $schulkennwort = mysqli_real_escape_string($_SESSION["verbindung"], $_POST["passkey"]);
    }
    else {
        $schulkennwortfalsch = "The School Password is wrong!";
        $warnung = "1";
    }

    //Wenn alle Eingaben korrekt, Speicherung der Daten in der Datenbank
    if (empty($warnung)) {
        $nutzerspeichern = "INSERT INTO `user` (`ID`, `username`, `password`, `email`) VALUES (NULL, '$username', '$password', '$email')";
        if (mysqli_query($_SESSION["verbindung"], $nutzerspeichern)) {
            $meldung = "You registered successfully!";


        }
        else {
            $meldungunten = "Registration canceled due to a database problem";
        }
    }
}

//Wenn nicht alle Felder ausgefüllt sind Abbruch
elseif (isset($_POST["register"])) {
    $meldungunten = "All fields have to be filled!";
}



?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Login & Registration </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>

        <div class="container">
            <header>

            </header>
            <section>

                <div id="container_demo" >

                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">














    <!--Sign up-->


                            <form method="post" >
                                <h1> Registrierung </h1>
                                <div class="text-success col-xs-8">
                                    <h4><?php if (isset($meldung)) { echo "$meldung";} ?></h4>
                                </div>
                              </br>
                                <p>
                                    <label for="username" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" class="form-control" name="username"  type="text" placeholder="Benutzername*" value="<?php if(isset($_POST["username"])) {echo htmlspecialchars($_POST["username"]);} ?>" />
                                    <?php if (isset($nutzerbesetzt)) {echo "<h5 class='text-danger'>$nutzerbesetzt</h5>";} else echo "<br>"; ?>
                                </p>
                                <p>
                                    <label for="email" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" class="form-control" name="email" type="text" placeholder="E-Mail-Adresse*" value="<?php if(isset($_POST["email"])) {echo htmlspecialchars($_POST["email"]);} ?>" />
                                </p>

                                <p>
                                    <label for="password" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="password" type="password" placeholder="Ihre Passwort*"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwortprüf"  type="password" placeholder="Passwort wiederholen*"/>
                                    <?php if (isset($keineübereinstimmung)) {echo "<h5 class='text-danger'>$keineübereinstimmung</h5>";} else echo "<br>";?>
                                </p>

                                <p>
                                    <label for="passkey" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passkey"  type="password" placeholder="Moin"/>
                                </p>
                                <?php if (isset($schulkennwortfalsch)) {echo "<h5 class='text-danger'>$schulkennwortfalsch</h5>";} else echo "<br>"; ?>
                                <div class="row">

                                        <button type="submit" class="button button1" name="register">Registrieren!</button>

                                    <div class="col-xs-8">
                                        <h5 class="text-danger">
                                            <?php
                                            if (!empty($meldungunten)){
                                                echo "$meldungunten";
                                            }
                                            ?>
                                        </h5>
                                      </br>
                                    </div>
                                </div>

                                    <p class="change_link">
                                    <a href="login.php" class="to_register">Anmeldung</a>
                                    </p>
                              </form>
                          </div>

                      </div>
                  </div>
              </section>
          </div>
      </body>
  </html>
  <?php
      function verbindung()
      {
          $_SESSION["verbindung"] = mysqli_connect('localhost', 'root','My102118910', 'immomaster');
          if (!$_SESSION["verbindung"]) {
              die("Connection failed!:".mysqli_connect_error());
          }
          return $_SESSION["verbindung"];
      }

      function nutzerarray()
      {
          $allenutzer = mysqli_query($_SESSION["verbindung"], "SELECT `username` FROM `user`");
          $nutzer = array();
          while ($row = mysqli_fetch_assoc($allenutzer)) {
              $nutzer[] = $row["username"];
          }
          return $nutzer;
      }
  ?>
