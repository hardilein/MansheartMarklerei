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
                <li><?php echo (!isLoggedIn()?'':'Hallo ' . $_SESSION['username'] . '!');?> </li>
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

    <img src="./app/shared/img/header.jpg"
         alt="Header Image"/>

    <main class="content-wrapper">
        <article class="site-content">

            <?php require_once "./app/Views/Account/Parts/login-form.php"; ?>
            <?php require_once "./app/Views/Account/Parts/register-form.php"; ?>

            <h1><?=$sitetitle?></h1>