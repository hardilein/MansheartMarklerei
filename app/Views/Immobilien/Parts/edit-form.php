<?php
if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}
?>

<div class="form edit-form">
    <form class="immobilie-create-form"
          enctype="multipart/form-data"
          action="?v=Create"
          method="POST">
        <input name="name"
               type="text"
               placeholder="Bezeichnung"
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
        <textarea
            name="description"
            placeholder="Beschreibung ..."></textarea>
        <input name="photo"
               type="file"
               placeholder="Bitte Foto Auswählen"
               value="<?php echo !empty($_SESSION["fields"]["username"]) ? $_SESSION["fields"]["username"] : ''; ?>"
        />
        <button type="submit" name="create">create</button>

    </form>


</div>