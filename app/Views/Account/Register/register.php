<?php
require_once "./app/Controllers/UserController.php";
//Da UserController.php sich nicht nur um die Registrierung kümmert übergeben wir noch eine Methode

?>

<div class="container">

    <h3>Registration</h3>


    <form action="index.php?v=Registrieren"
          method="post">
        <div class="form-group <?php echo !empty($usernameError) ? 'error' : ''; ?>">
            <label for="username">Username</label>

            <input class="form-control"
                   id="username"
                   name="username"
                   type="text"
                   placeholder="Name"
                   value="<?php echo !empty($username) ? $username : ''; ?>">
            <?php if (!empty($usernameError)): ?>
            <span class="note">
                <?php echo $usernameError; ?></span>
            <?php endif;?>
            <?php if (!empty($usernameDuplicateError)): ?>
            <span class="note">
                <?php echo $usernameDuplicateError; ?></span>
            <?php endif;?>

        </div>
        <div class="form-group <?php echo !empty($passwordError) ? 'error' : ''; ?>">
            <label for="password">Password</label>

            <input class="form-control"
                   id="password"
                   name="password"
                   type="password"
                   placeholder="Password"
                   value="<?php echo !empty($password) ? $password : ''; ?>">
            <?php if (!empty($passwordError)): ?>
            <span class="note">
                <?php echo $passwordError; ?></span>
            <?php endif;?>

        </div>
        <div class="form-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
            <label for="email">Email</label>

            <input class="form-control"
                   id="email"
                   name="email"
                   type="email"
                   placeholder="E-Mail"
                   value="<?php echo !empty($email) ? $email : ''; ?>">
            <?php if (!empty($emailError)): ?>
            <span class="note">
                <?php echo $emailError; ?></span>
            <?php endif;?>

        </div>

        </div>

        <div class="form-actions">
            <button type="submit"
                    class="lg_btn">Registrieren</button>
            <a class="lg_btn"
               href="index.php">Zurück</a>
        </div>
    </form>
</div>
</div>