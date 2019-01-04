<?php
if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}
$title = "Alle Immobilien";

// session_start();
print_r ($_SESSION);

?>

  <?php
$pdo = Database::connect();
$sql = 'SELECT * FROM immobilien ORDER BY id DESC';
$i=0;
foreach ($pdo->query($sql) as $row) {
$oddclass = (++$i % 2)?"":"alt";

// Einer der vielen möglichen Lösungen (die einfachste)
$description = explode('.', $row['description']);
$shortDescription = array_shift($description) . ". ". array_shift($description); // 2 Sätze als Short Description anzeigen
$longDescription = implode(". ", $description); //Der Rest

?>

<div class="immo-card <?php echo $oddclass;?>">
<div class="meta">
  <div class="photo" style="background-image: url(./Uploads/<?php echo $row["photo"];?>)"></div>
  <ul class="details">
    <li class="agent"><a href="#">Makler: Jurij Befus</a></li>
    <li class="date">Aug. 24, 2018</li>
    <li class="tags">
      <ul>
        <li><a href="#">Learn</a></li>
        <li><a href="#">Code</a></li>
        <li><a href="#">HTML</a></li>
        <li><a href="#">CSS</a></li>
      </ul>
    </li>
  </ul>
</div>
<div class="description">
  <div class="header">
    <h1><?php echo $row['name'];?></h1>
    <div class="watch-icon<?php echo isInWatchList($row['id'])?'-active':'';?>"><a href="?v=Watch&a=<?php echo isInWatchList($row['id'])?'delete':'add';?>&id=<?php echo $row['id'];?>"></a></div>
  </div>
  <h2>Bj. <?php echo $row['yearofconstruction'];?> - <?php echo $row['size'];?>m² - Lvl. <?php echo $row['nr_floors'];?>- <?php echo $row['nr_rooms'];?> Zi.</h2>
  <div>
    <input type="checkbox" class="read-more-state" id="immo-<?php echo $row['id'];?>" />
    <div class="read-more-wrap">
      <p><?php echo $shortDescription ;?>
        <span class="read-more-target"><?php echo $longDescription ;?></span>
      </p>
    </div>
    <div class="price">
      <span>€<?php echo number_format($row['price'],0,',','.').",-";?></span>
    </div>
    <label for="immo-<?php echo $row['id'];?>" class="read-more-trigger"></label>
  </div>
</div>
</div>












<?php
}
Database::disconnect();
?>