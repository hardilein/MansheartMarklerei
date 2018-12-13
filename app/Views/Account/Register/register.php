<?php
/**
 * Created by PhpStorm.
 * User: vitalij
 * Date: 2018-12-09
 * Time: 22:23
 */

require_once 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nameError   = null;
    $emailError  = null;
    $mobileError = null;

    // keep track post values
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];

    // validate input
    $valid = true;
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid     = false;
    }

    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid      = false;
    }
    else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = 'Please enter a valid Email Address';
            $valid      = false;
        }
    }

    if (empty($mobile)) {
        $mobileError = 'Please enter Mobile Number';
        $valid       = false;
    }

    // insert data
    if ($valid) {
        $pdo = Database::connect();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
        $q   = $pdo->prepare($sql);
        $q->execute(array($name, $email, $mobile));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Customer</h3>
        </div>

        <form class="form-horizontal" action="create.php" method="post">
            <div class="form-group <?php echo !empty($nameError) ? 'error' : ''; ?>">
                <label for="name">Name</label>

                <input class="form-control" id="name" name="name" type="text" placeholder="Name"
                       value="<?php echo !empty($name) ? $name : ''; ?>">
                <?php if (!empty($nameError)): ?>
                    <span class="help-inline"><?php echo $nameError; ?></span>
                <?php endif; ?>

            </div>
            <div class="form-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                <label for="email">Email Address</label>

                <input class="form-control" id="email" name="email" type="text" placeholder="Email Address"
                       value="<?php echo !empty($email) ? $email : ''; ?>">
                <?php if (!empty($emailError)): ?>
                    <span class="help-inline"><?php echo $emailError; ?></span>
                <?php endif; ?>

            </div>
            <div class="form-group <?php echo !empty($mobileError) ? 'error' : ''; ?>">
                <label for="mobile">Mobile Number</label>

                <input class="form-control" id="mobile" name="mobile" type="text" placeholder="Mobile Number"
                       value="<?php echo !empty($mobile) ? $mobile : ''; ?>">
                <?php if (!empty($mobileError)): ?>
                    <span class="help-inline"><?php echo $mobileError; ?></span>
                <?php endif; ?>

            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="index.php">Back</a>
            </div>
        </form>
    </div>
</div> 
