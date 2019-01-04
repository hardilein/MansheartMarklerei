
<?php if(isset($_GET['loginsuccess']) || isLoggedIn()): ?>

    <div id="open-modal-login"
         class="modal-window">
        <div>
            <a href="#"
               title="Close"
               class="modal-close">Schliessen</a>
            <h1>Erfolgreich eingeloggt</h1>
            <p class="message">Weiter <a href="#">zur Seite</a></p>
        </div>
    </div>

<?php else: ?>

    <div id="open-modal-login"
         class="modal-window">
        <div>
            <a href="#"
               title="Close"
               class="modal-close">Schliessen</a>
            <h1>Login</h1>

            <div class="form">
                <form class="login-form"
                      method="POST"
                      action="index.php?v=Login">
                    <input type="text"
                           name="username"
                           placeholder="username"/>
                    <input type="password"
                           name="password"
                           placeholder="password"/>
                    <button type="submit">Einloggen</button>
                    <p class="message">Nicht registriert? <a href="#open-modal-register">Registrieren</a></p>
                </form>
            </div>

        </div>
    </div>

<?php endif; ?>


