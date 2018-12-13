<?php
require_once "./app/Controllers/UserController.php"
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
                   type="text"
                   placeholder="E-Mail"
                   value="<?php echo !empty($email) ? $email : ''; ?>">
            <?php if (!empty($emailError)): ?>
            <span class="note">
                <?php echo $emailError; ?></span>
            <?php endif;?>

        </div>
        <div class="form-group <?php echo !empty($rollenIdError) ? 'error' : ''; ?>">
            <label for="rollenId">Rolle</label>

            <select id="rollenId"
                    name="rollenId"
                    type="text"
                    placeholder="Rolle"
                    value="<?php echo !empty($rollenId) ? $rollenId : ''; ?>">
                <option value="" selected>Bitte wählen..</option>
                <option value="1">Basis</option>
                <option value="2">Makler</option>
            </select>

            <?php if (!empty($rollenIdError)): ?>
            <span class="note">
                <?php echo $rollenIdError; ?></span>
            <?php endif;?>

        </div>



        <div class="form-actions">
            <button type="submit"
                    class="btn btn-success">Create</button>
            <a class="btn"
               href="index.php">Back</a>
        </div>
    </form>
</div>
</div>