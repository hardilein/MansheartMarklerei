<?php
if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}


require_once "./app/Controllers/ImmobilienController.php";

if(!isLoggedIn()) {
    $immobilien = getAllImmobilien();
} else {
    $immobilien = getAllImmobilienByUserId($_SESSION['userid']);
}


?>
    <div id="sub-nav">
        <nav>
            <?php if(isLoggedIn()):?>
            <a href="/html/">Alle Immobilien</a>
            <?php endif;?>
            <a href="#">Watchlist (<?= getWatchlistCount() ?>)</a>
        </nav>
    </div>
<?php

$i=0;
foreach ($immobilien as $immo) {
    $oddclass = (++$i % 2)?"":"alt";

    // Einer der vielen möglichen Lösungen
    $description = explode('.', $immo['description']);
    $shortDescription = array_shift($description) . ". ". array_shift($description); // 2 Sätze als Short Description anzeigen
    $longDescription = implode(". ", $description); //Der Rest

    $immo['date_posted'] = date_format(date_create($immo['date_posted']), 'd.m.Y');

?>


    <div id="immo-card-<?=$immo['id']?>" class="immo-card <?=$oddclass?>">
    <div class="meta">
      <div class="photo" style="background-image: url('./Uploads/<?=$immo["photo"]?>')"></div>
      <ul class="details">
        <li class="agent"><a href="#">Makler: <?=$immo['username']?></a></li>
        <li class="date"><?=$immo['date_posted']?></li>
      </ul>
    </div>
    <div class="description">
      <div class="header">
        <h2><?=$immo['name']?></h2>
        <div class="watch-icon<?=isInWatchList($immo['id'])?'-active':''?>">
            <a href="?v=Watch&a=<?=isInWatchList($immo['id'])?'delete':'add'?>&id=<?=$immo['id']?>"></a>
        </div>
      </div>
      <h3>Bj. <?=$immo['yearofconstruction']?> - <?=$immo['size']?>m² - Lvl. <?=$immo['nr_floors']?>- <?=$immo['nr_rooms']?> Zi.</h3>
      <div>
        <input type="checkbox" class="read-more-state" id="immo-<?=$immo['id']?>" />
        <div class="read-more-wrap">
          <p><?=$shortDescription ?>
            <span class="read-more-target"><?=$longDescription ?></span>
          </p>
        </div>
        <div class="price">
          <span>€<?=number_format($immo['price'],0,',','.').",-"?></span>
        </div>
        <label for="immo-<?=$immo['id']?>" class="read-more-trigger"></label>
      </div>
    </div>
    </div>












<?php }?>
<div class="center">
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#" class="active">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>
</div>

<?php
Database::disconnect();
?>