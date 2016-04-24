<!DOCTYPE html>
<html lang="en">
<head>
  <title>Copter Central - Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="stylesheet.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="script.js"></script>
  <style>
  #sash{
    -ms-transform: rotate(340deg); /* IE 9 */
    -webkit-transform: rotate(340deg); /* Chrome, Safari, Opera */
    transform: rotate(340deg);
  }
  img{
    max-width:200px;
    max-height:auto;
  }

  header{
    min-height: 200px
    min-width: auto;
  }

  .weller{
    min-height:380px;
  }
  </style>
</head>
<body>

<div class="container" style="">




					
  <!-- User php stuff at top bar -->
  <div>
		<form id="login-register" method="post" action="login-register.php">

			<input type="text" placeholder="email" name="email" autofocus />
			<input type="password" placeholder="password" name="password" />

			<button class="btn btn-sm btn-primary " type="submit">Login / Register</button>

			<span></span>

		</form>
  </div>
				


  <!-- Big screen in middle with div across it. -->
  <div class="jumbotron" style="background-color:#EEFFFF; color:#0099CC; min-height:100px; padding:10px; margin-bottom:0px;">

    <div class="col-sm-6">
      <h1> <b>Copter Central</b> </h1>
    </div>

    <div class="col-sm-6" style="margin-bottom: 130px;">
      <img id="sash" src="res/phantom.png" style="margin-left:310px; width:250px; height:auto; position:absolute;"> </img>
    </div>
  </div>

  <div class="well row" style="margin-left:0px; align:center; max-width:100%; margin-top:0px;">
    <div class="col-sm-3">
      <h2>Search Filters</h2>
    </div>

      <form action="searchlist.php">
        <div class="col-sm-3">
	Product<br>
	<input type="radio" name="product" value="copter" checked> Copters
	<input type="radio" name="product" value="motor"> Motors
	<input type="radio" name="product" value="batteries"> Batteries <br>
        <input type="radio" name="product" value="controlers"> Controllers
        <input type="radio" name="product" value="cameras"> Cameras
        <input type="radio" name="product" value="mounts"> Mounts

	</div>
        <div class="col-sm-3">
        Price<br>
	<input type="text" name="price"> Max Price
        <input type="radio" name="order" value="des" checked> Low-to-High
        <input type="radio" name="order" value="asc"> High-to-Low
        </div>

        <div class="col-sm-3">
        Rating<br>
        <input type="radio" name="rating" value="5"> 5/5
        <input type="radio" name="rating" value="4"> 4/5
        <input type="radio" name="rating" value="3"> 3/5
        <input type="radio" name="rating" value="2" checked> 2/5
        <input type="radio" name="rating" value="1"> 1/5

	<input type="submit">
        </div>


      </form>
  </div>

  <!-- Navigation bar across top.
  <nav class="navbar navbar-default" style="top:0px;">
    <div class="container-fluid">
      <ul class="nav navbar-nav" style="font-weight:bold;">
        <li><a href="#">Quadcopters</a></li>
        <li><a href="#">Controllers</a></li>
        <li><a href="#">Motors</a></li>
        <li><a href="#">LEDs</a></li>
        <li><a href="#">Batteries</a></li>
        <li><a href="#">Cameras</a></li>
        <li><a href="#">Mounts</a></li>
        <li><a href="#">Starter Kits</a></li>
      </ul>
    </div>
  </nav>
  -->

  <!-- Containers for storing the top items. -->
  <!--<div class="container">-->
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "new_db_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_POST["price"]!=NULL){
	echo "I didn't get anything,<br> <br><br> default sql...";
}

$sql = "SELECT * FROM `copter` ORDER BY `copter`.`rating` DESC LIMIT 0 , 6";

//$sql = "SELECT * FROM parts ORDER BY 'parts' . 'rating' ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $count = 1;
    //echo '<div class="row">';
    while($row = $result->fetch_assoc()) {

        if ($count % 3 == 0) {
	  echo '<div class="row">';
	}
        echo '<div class="col-sm-4" style="margin:0px;padding:5px;"> <div class="well" style="min-height:300px;">';
          echo "<h2>" . $row["name"] . "</h2>";
          echo "<img src=\"" . $row["img"] . "\" />";
          echo "<br>  Rating:" .$row["rating"] . "/5   <br>ID:" . $row["ID"];
	  echo '<br> <button class="pull-right btn btn-primary"> Buy </button> ';
        echo '</div> </div>';
        if ($count % 3 == 0) {
          echo '</div>';
        }
        $count++;
        //echo $count;
    }
    //echo '</div>';
} else {
    echo "0 results";
}
$conn->close();


  ?>
  <!--</div>-->
  <div class="navbar navbar-inverse" style="background-color:gray; border-color:#4d4d4d; color:white; min-height:80px; margin-bottom:0px; text-align:center;">
    <br><br>
    <p>© 2016 Copter Central, Inc. All rights reserved.</p>
  </div>
</div>
</body>
</html>

