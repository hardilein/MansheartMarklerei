<?php
session_start();
//Bei jedem Aufruf der Anmeldeseite eine neue ID erstellen
session_regenerate_id(true);

//Verbindung zur DB herstellen
$_SESSION["verbindung"] = verbindung();

//Wenn Eingabe bei E-Mail und Passwort
$warnung = anmelden();
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Login</title>
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
                        <div id="login" class="animate form">
                            <form  method="post">
                                <h1>Log in</h1>
                                <p>
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <p class="keeplogin">
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button">
                                    <input type="submit"  class="btn btn-success" />
								</p>

                <h5 class="text-danger">
                    <?php
if (!empty($warnung)) {
    echo "$warnung";
}
?>
                </h5>


                                <p class="change_link">
									Not a member yet ?
									<a href="login-reg.php" class="to_register">Registrieren</a>
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
    $_SESSION["verbindung"] = mysqli_connect('localhost', 'root', 'My102118910', 'immomaster');
    if (!$_SESSION["verbindung"]) {
        die("Connection failed!:" . mysqli_connect_error());
    }
    return $_SESSION["verbindung"];
}

function anmelden( /*$_SESSION["verbindung"]*/)
{
    if (isset($_POST["username"]) && isset($_POST["password"])) {

        $username = mysqli_real_escape_string($_SESSION["verbindung"], $_POST["username"]);
        $password = mysqli_real_escape_string($_SESSION["verbindung"], $_POST["password"]);

        $allenutzer = "SELECT * FROM `user` WHERE `username` = '$username'";

        //Wenn Nutzername in Datenbank gefunden wurde
        $result = mysqli_query($_SESSION["verbindung"], $allenutzer);
        if ($result) {
            $user = mysqli_fetch_assoc($result);
            $hash = $user["password"];
            //Wenn Passwort übereinstimmt Weiterleitung auf Hauptseite und Name der Person als Session Array
            if (password_verify($password, $hash)) {
                $_SESSION["benutzer"] = htmlspecialchars($user["email"]);
                header("Location: welcome.php");
                die();
            } else {
                $warnung = "Failed to log in, please try again!";
                return $warnung;
            }
        } else {
            $warnung = "Failed to log in, Database Error";
            return $warnung;
        }
    }
}
?>
