<?php
if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}
?>


  `userid` INT
  `name` VARCHAR
  `size` INT
  `nr_rooms` INT
  `nr_floors` INT
  `yearofconstruction` INT
  `description` TEXT CHARACTER
  `photo` VARCHAR



<div class="form">
<form class="register-form"
      action="?v=Registrieren"
      method="POST">
  <input name="name"
         type="text"
         placeholder="name"
         value="<?php echo !empty($_SESSION["fields"]["username"]) ? $_SESSION["fields"]["username"] : ''; ?>"
          />
  <input name="size"
         type="number"
         placeholder="Größe"
         value="<?php echo !empty($_SESSION["fields"]["username"]) ? $_SESSION["fields"]["username"] : ''; ?>"
          />
  <input name="nr_rooms"
         type="number"
         placeholder="Anzahl Räume"
         value="<?php echo !empty($_SESSION["fields"]["username"]) ? $_SESSION["fields"]["username"] : ''; ?>"
          />
  <input name="nr_floors"
         type="number"
         placeholder="Anzahl Stockwerke"
         value="<?php echo !empty($_SESSION["fields"]["username"]) ? $_SESSION["fields"]["username"] : ''; ?>"
          />
  <input name="yearofconstruction"
         type="year"
         placeholder="Baujahr"
         value="<?php echo !empty($_SESSION["fields"]["username"]) ? $_SESSION["fields"]["username"] : ''; ?>"
          />

  <input name="photo"
         type="hidden"
         placeholder="Bitte Foto Auswählen"
         value="<?php echo !empty($_SESSION["fields"]["username"]) ? $_SESSION["fields"]["username"] : ''; ?>"
          />

  <button type="submit">create</button>
  <p class="message">Already registered? <a href="#open-modal-login">Sign In</a></p>
</form>




</div>