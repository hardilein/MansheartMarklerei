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
                <a href="create.php" class="btn btn-success">Create</a>
            </p>
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
    echo '<tr>';

    echo '<td><img class="immo_img"src="./Uploads/' . $row['photo'] . '"></td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['size'] . '</td>';
    echo '<td>' . $row['nr_rooms'] . '</td>';
    echo '<td>' . $row['nr_floors'] . '</td>';
    echo '<td>' . $row['yearofconstruction'] . '</td>';

    echo '<td><a class="btn" href="read.php?id=' . $row['id'] . '">Read</a></td>';
    echo '</tr>';
}
Database::disconnect();
?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    </body>
    </html>

