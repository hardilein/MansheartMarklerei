<?php
if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}
$title = "Alle Immobilien";

session_start();
print_r ($_SESSION);

?>

  <?php
$pdo = Database::connect();
$sql = 'SELECT * FROM immobilien ORDER BY id DESC';
$i=0;
foreach ($pdo->query($sql) as $row) {
$oddclass = (++$i % 2)?"":"alt";
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
    <div class="watch-icon"><a href="#"></a></div>
  </div>
  <h2>Bj. <?php echo $row['yearofconstruction'];?> - <?php echo $row['size'];?>m² - Lvl. <?php echo $row['nr_floors'];?>- <?php echo $row['nr_rooms'];?> Zi.</h2>
  <div>
    <input type="checkbox" class="read-more-state" id="post-1" />
    <div class="read-more-wrap">
      <p><?php echo $row['description'];?>
        <span class="read-more-target">Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</span>
      </p>
    </div>
    <div class="price">
      <span>€<?php echo number_format($row['price'],0,',','.').",-";?></span>
    </div>
    <label for="post-1" class="read-more-trigger"></label>
  </div>
</div>
</div>












<?php
}
Database::disconnect();
?>