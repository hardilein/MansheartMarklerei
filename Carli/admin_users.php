<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="css/dashboard.min.css">
  </head>
  <body>
    <header>
      <h1>HAB</h1>
    </header>
    <nav>
      <input type="checkbox" id="nav-menu-btn" />
      <label for="nav-menu-btn"></label>
      <ul>
        <li><a href="admin_allprodukts.php">All Products</a></li>
        <li><a href="admin_addproducts.php">Add Products</a></li>
        <li><a href="admin_users.php">Users</a></li>
        <li><a href="#">Setting</a></li>
      </ul>
    </nav>
    <main class="container-fluid">
      <div class="row">






<!--Start Product -->
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="panel info">
        <header>
          <h2>Products</h2>
        </header>



          <form method="post" action="admin_user.php">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Produkte Suchen" title="Type in a name">
                      <table id="myTable" >
                        <thead>
                        <tr class="header">
                        <th>Email</th>
                        <th>Username</th>
                        <th>Edit</th>
                        </tr>
                      </thead>
                      <!--
                      <tfoot>
                        <tr>
                        <th>productname</th>
                        <th>description</th>
                        <th>purchaseprice</th>
                        <th>livingspace</th>
                        <th>room</th>
                        <th>yearofconstruction</th>
                        <th>floors</th>
                        <th>cellar</th>
                        <th>photo</th>
                        <th>Edit</th>
                        </tr>
                      </tfoot>
                      <tbody>
                      </form>
                    -->
                      <!-- NICHT ERLAUBT???-->
                                    <script>
                                      function myFunction() {
                                        var input, filter, table, tr, td, i, txtValue;
                                        input = document.getElementById("myInput");
                                        filter = input.value.toUpperCase();
                                        table = document.getElementById("myTable");
                                        tr = table.getElementsByTagName("tr");
                                        for (i = 0; i < tr.length; i++) {
                                          td = tr[i].getElementsByTagName("td")[0];
                                          if (td) {
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                              tr[i].style.display = "";
                                            } else {
                                              tr[i].style.display = "none";
                                            }
                                          }
                                        }
                                      }
                                    </script>
                        <?php
                        $mysqli = new mysqli("localhost", "root", "My102118910", "immomaster");
                        if($mysqli->connect_errno){
                          echo "Failed connect(".$mysqli->connect_errno.")".$mysqli->connect_error;
                        }

                        $query = $mysqli->query("select id, email, username from user");
                        while($row = $query->fetch_assoc()){
                          ?>
                          <tr>

                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['username'] ?></td>
                          <td>
                            <a href="updateevent.php?id=<?=$row['id']?>" class="Edit" title="Bearbeiten" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="#myModal" class="trigger-btn" title="Löschen" data-toggle="modal"><i class="material-icons">&#xE5C9;</i></a>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        </table>



                        <?php
                        $connection = mysqli_connect('localhost', 'root','My102118910', 'immomaster');

                        if(!$connection)
                        {
                        die("Database Connection Failed". mysqli_error($connection));
                        }
                        $select_db = mysqli_select_db($connection, 'immomaster');

                        if(!$select_db)
                        {
                        die("Database Selection Failed". mysqli_error($connection));
                        }


                        if (isset($_GET['id'])){
                        $sql = "Delete from user where id =".$_GET['id'];
                        if(mysqli_query($connection, $sql)){

                        ?>
                        <div class="text-center">
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button  type="button" class="close" data-dismiss="alert" aria-lable="close"><span aria-hidden="true">&times;</

                        <span></button>
                        <strong>Success!</strong>Your Data has been deleted.

                        </div>
                        </div>

                        <?php
                        }else{

                        ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-lable="close"><span aria-hidden="true">&times;</
                        <span></button>
                        <strong>Failed!</strong>Error updatting data, please try again.
                        </div>
                        <?php
                        }
                        }

                        ?>









  <!--For Product-->    </div>
  <!--For Product-->   </div>






























<!--Start Row--></div>





















    </main>
    <footer>
      <p>
        <small>
        made with /Icon-heart/ by
        <a href="">HAB</a>
        </small>
      </p>
    </footer>
  </body>
</html>
