<div id="open-modal-register"
     class="modal-window">
    <div>
        <a href="#"
           title="Close"
           class="modal-close">Schliessen</a>
        <h1>Registrieren</h1>
        <div class="message">
            <?php #
            if (isset($_GET["message"])) {
                echo $_GET["message"];
            }
            if (isset($_GET["errormessage"])) {
                echo $_GET["errormessage"];
            }

            ?>
        </div>

        <div class="form">
            <form class="register-form"
                  action="?v=Registrieren"
                  method="POST">
                <input name="username"
                       type="text"
                       placeholder="name"
                       value="<?php echo !empty($_SESSION["fields"]["username"]) ? $_SESSION["fields"]["username"] : ''; ?>"
                />
                <input name="password"
                       type="password"
                       placeholder="password"
                       value="<?php echo !empty($_SESSION["fields"]["password"]) ? $_SESSION["fields"]["password"] : ''; ?>"
                />
                <input name="email"
                       type="email"
                       placeholder="email address"
                       value="<?php echo !empty($_SESSION["fields"]["email"]) ? $_SESSION["fields"]["email"] : ''; ?>"
                />
                <button type="submit">Registrieren</button>
                <p class="message">Bereits registriert? <a href="#open-modal-login">Einloggen</a></p>
            </form>
        </div>

    </div>
</div>