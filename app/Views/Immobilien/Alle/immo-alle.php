<?php
if (!defined('AccessConstant')) {
    die('Direct access not permitted');
}
$title = "Alle Immobilien";
?>

<body>
    <div class="container">
        <div class="row">
            <h3>Alle Immobilien</h3>
        </div>
        <div class="row">
            <p>
                <a href="create.php"
                   class="btn btn-success">Create</a>
            </p>




        </div>
                    <?php
$pdo = Database::connect();
$sql = 'SELECT * FROM immobilien ORDER BY id DESC';
foreach ($pdo->query($sql) as $row) {

    echo '<div class="immo-card">
    	        <div id="card-left">
        	        <img class="immo_img"src="./Uploads/' . $row['photo'] . '"/>
                    <p>Posted 21.12.2018</p>
            </div>
            <div id="card-right">
                <div id="card-right-top">
                ' . $row['yearofconstruction'] . '
                    <b>' . $row['name'] . '</b>
                    <div class="watchlink">
                        <a href="#">*</a>
                    </div>
                </div>
                <div id="card-right-middle">
                ' . $row['size'] . ' m&sup2, ' . $row['nr_rooms'] . ' Räume,' . $row['nr_floors'] . ' Stockwerke
                    <div class="card-right-middle-description">' . $row['description'] . '</div>
                    <span>Read more....</span>
                </div>
                <div id="card-right-bottom">
                ' . $row['price'] . ' €
                </div>
            </div>';

}
Database::disconnect();
?>
                <!-- </tbody>
            </table> -->
        </div>
    </div> <!-- /container -->
</body>

</html>