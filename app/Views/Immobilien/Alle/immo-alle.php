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

            //


            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Bild</th>
                        <th>Name</th>
                        <th>Größe</th>
                        <th>Anzahl Räume</th>
                        <th>Stockwerke</th>
                        <th>Jahr</th>
                        <th>Optionen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$pdo = Database::connect();
$sql = 'SELECT * FROM immobilien ORDER BY id DESC';
foreach ($pdo->query($sql) as $row) {
    // echo '<tr>
    //         <td><img class="immo_img"src="./Uploads' . $row['photo'] . '"></td>
    //         <td>' . $row['name'] . '</td>
    //         <td>' . $row['qm'] . '</td>
    //         <td>' . $row['rooms'] . '</td>
    //         <td>' . $row['floors'] . '</td>
    //         <td>' . $row['yearofconstruction'] . '</td>

    // <td><a class="btn" href="read.php?id=' . $row['id'] . '">Read</a></td>
    // </tr>';

 echo   '<div class="card">
    	        <div id="card-left">
        	        <img class="immo_img"src="./Uploads' . $row['photo'] . '"/>
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
                ' . $row['qm'] . ' m&sup2, ' . $row['rooms'] . ' Räume,' . $row['floors'] . ' Stockwerke
                    <div class="card-right-middle-description">' . $row['descr'] . '</div>
                    <span>Read more....</span>
                </div>
                <div id="card-right-bottom">
                ' . $row['price'] . ' €
                </div>
            </div>';

}
Database::disconnect();
?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
</body>

</html>