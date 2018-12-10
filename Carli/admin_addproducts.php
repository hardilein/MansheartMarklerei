
<?php
  /*
      IMG DOWNLOAD AND UPLOAD

      if(isset($_post['addevent_btn'])){
        $target = "img/".basename($_FILES['image']['name']);

        $image = $_FILES['image']['name'];

        $sql = "INSERT INTO logo (image) VALUES ('$image')";
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
          $msg = "JOOOOOOOOOOOOOOOO!";
        }else{
          $msg = "NOOOOOOOOOOOOOOOO!";
        }
      }
*/
?>


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
        <li><a href="#">Users</a></li>
        <li><a href="#">Setting</a></li>
      </ul>
    </nav>

      <div  class="row">







    <div class="container ">
      <div class="panel">
        <header>
          <h2>Add Product</h2>
        </header>




        <!-- START -->
      	<form class="form-horizontal" method="post" action="admin_addproducts.php" enctype="multipart/form-data">
      	<fieldset>

          <?php
          session_start();

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

          // INSERT;
          if (isset($_POST['add_product']))
          {
          		$productname 	      = $_POST['productname'];
          		$description 	      = $_POST['description'];
          		$purchaseprice      = $_POST['purchaseprice'];
          		$livingspace	      = $_POST['livingspace'];
          		$room	              = $_POST['room'];
          		$yearofconstruction	= $_POST['yearofconstruction'];
          		$floors	            = $_POST['floors'];
              $cellar	            = $_POST['cellar'];
              /*
              $photo	            = $_POST['photo'];
              */

          	$insert = "INSERT INTO product (productname, description, purchaseprice, livingspace, room, yearofconstruction, floors , cellar)
          	VALUES ('$productname', '$description', '$purchaseprice', '$livingspace', '$room', '$yearofconstruction', '$floors', '$cellar')";

          	$row = mysqli_query($connection, $insert) or die(mysqli_error($connection));

          	$select = "SELECT max(id) as id FROM product";
          	$eventresult = mysqli_query($connection, $select)->fetch_assoc();
          	$eventid = $eventresult['id'];
          if($eventresult){
          ?>


          <div class="alert success">
            <span class="closebtn">&times;</span>
            <strong>Super! &#9786;</strong> Ihre Daten wurden aktualisiert
          </div>

          <?php
        }else{
          ?>
          <div class="alert">
            <span class="closebtn">&times;</span>
            <strong>OPS! &#9785;</strong> Fehler beim Aktualisieren der Daten, bitte erneut versuchen
          </div>
        <?php
        }
        }
        ?>






          <!-- Productname -->
        	<div class="form-group row col-md-offset-3">
            <div class="col-md-8">
        	  <label for="productname">Productname</label></br>
        	    <input class="form-control" type="text" placeholder="productname" name="productname">
        	  </div>
        	</div>

      	<!-- description -->
      	<div class="form-group row col-md-offset-3" >
          <div class="col-xs-8">
      	  <label for="description">description</label>
      	  <textarea class="form-control" cols="30" rows="4"  placeholder="description" name="description"></textarea>
          </div>
      	</div>

        <!-- floors & Date-->
        <div class="form-group row col-md-offset-3">
          <div class="col-md-4">
            <label for="date">date</label>
            <input class="form-control" type="date" name="yearofconstruction">
          </div>
          <div class="col-md-4">
            <label for="floors">floors</label>
            <input placeholder="floors" name="floors" type="text">
          </div>
        </div>

    <!-- purchaseprice & livingspace-->
    <div class="form-group row col-md-offset-3">
      <div class="col-md-4">
        <label for="purchaseprice">purchaseprice</label>
        <span class="currency">&euro;</span>
        <input placeholder="purchaseprice &euro;" name="purchaseprice" pattern="[0-9]*" type="text" >
      </div>

      <div class="col-md-4">
        <label for="livingspace">livingspace m²</label>
        <input class="form-control" placeholder="livingspace m²" name="livingspace" type="text">
      </div>
    </div>

<div class="form-group row col-md-offset-3">
    <div class="col-xs-4">
      <label for="room">room</label></br>
      <select name="room" >
        <option selected value="0">room</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
    </div>

    <div class="col-xs-4">
      <label for="cellar">cellar</label></br>
      <select name="cellar" >
        <option selected  value="0">cellar</option>
        <option value="Ja">Ja </option>
        <option value="Nein">Nein</option>
      </select>
    </div>
    </div>


      <!-- Photo -->
    <div class="form-group row col-md-offset-3">
      <div class="col-md-8">
      <label for="photo"> Photo</label>
        <input class="form-control" type="file"  name="photo">
      </div>
    </div>



      </br>
      <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
          <button class="btn btn-primary btn-lg btn-block" name="add_product" data-toggle="modal" data-target="#myModal" >
            Add Product
          </button>
        </div>
      </div>



      </form>
        </fieldset>
  <!--Add-->    </div>
  <!--Add-->    </div>




























































<!--Start Row--></div>














































          </div>
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
