<?php

define('AccessConstant', true);

session_start();


require_once './app/Data/DataContext.php';
require_once "./app/Controllers/UserController.php";
require_once "./app/Controllers/WatchController.php";

//TODO: überall title einfügen
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">

    <title>HAB</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          type="text/css"
          media="screen"
          href="./app/shared/main.css"/>
</head>

<body>
<div class="site">


    <header class="site-header">
        <h1 class="site-title">Mansheart Marklerei</h1>

        <nav class="site-navigation">
            <ul>
                <li>
                    <?php if(!isLoggedIn()):?>
                        <a href="#open-modal-login">Login</a></li>
                    <?php else:?>
                        <a href="?v=Logout">Logout</a></li>
                    <?php endif;?>
                <li><a href="#open-modal-register">Registrieren</a></li>
                <li><a href="#">
                        <div class="dropdown">
                            <span>Watchlist (<?= getWatchlistCount() ?>)</span>
                            <div class="dropdown-content">
                                <p>Hello World!</p>
                                <p>Hello World!</p>
                                <p>Hello World!</p>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </nav><!-- .site-navigation -->
    </header><!-- .site-header -->

    <?php require_once "./app/Views/Account/Parts/login-form.php"; ?>
    <?php require_once "./app/Views/Account/Parts/register-form.php"; ?>


    <img src="./app/shared/img/header.jpg"
         alt="Header Image"/>

    <main class="content-wrapper">
        <article class="site-content">
            <h1>Unsere Immobilien-Angebote</h1>


            <?php
            //Routen-Parameter als Query-String
            if (!isset($_GET['v'])) {
                $view = "";
            }
            else {
                $view = $_GET['v'];
            }
            if (!isset($_GET['id'])) {
                $unitId = 0;
            }
            else {
                $unitId = $_GET['id'];
            }

            // include "./app/shared/header.php";

            // routing anhand übergebener Werte
            switch ($view) {
                case 'Immobilien':
                    require_once "./app/Views/Immobilien/Alle/immo-alle.php";
                    break;
                case 'Create':
                    require_once "./app/Views/Immobilien/Edit/immo-edit.php";
                    break;
                default:
                    require_once "./app/Views/Immobilien/Alle/immo-alle.php";
                    break;
            }
            ?>


        </article><!-- .site-content -->
    </main><!-- .content-wrapper -->

    <footer class="site-footer">
        <div class="column">
            <h3>Unsere Makler</h3>
            <p>Jurij Befus<br/>
                Noch Einer<br/>
                Und-Noch Einer</p>
        </div>

        <div class="column">
            <h3>Unsere Adresse</h3>
            <p>Planet Erde<br/>
                Sonnensystem 5<br/>
                77777 Universum</p>
        </div>

        <div class="column last">
            <h3>A Column...</h3>
            <p>Sit amet tootsie roll I love I love I love carrot cake. Cupcake candy icing wafer apple pie muffin powder
                sugar plum. Marzipan lollipop cake icing.</p>
        </div>


    </footer><!-- .site-footer -->
</div><!-- .site -->


</body>

</html>