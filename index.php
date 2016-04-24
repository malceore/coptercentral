<!DOCTYPE html>
<html lang="en">
<head>
  <title>Copter Central</title>
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
    width:200px;
    height:auto;
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
  <?php
    session_start();
    if($_SESSION['name'] == NULL){
      echo '<div><form id="login-register" method="post" action="login-register.php"><input type="text" placeholder="email" name="email" autofocus /><input type="password" placeholder="password" name="password" /><button class="btn btn-sm btn-primary " type="submit">Login / Register</button><span></span></form></div>';
    }else{
      echo "<h4>Hello " . $_SESSION['name'] . "!</h4>";
      echo ' <a href="logout.php"><button class="btn btn-primary" >Logout </button></a>';
      echo '<a href="cart.php"><button class="btn btn-primary" >Cart </button></a>';
    }
  ?>

  <!-- Big screen in middle with div across it. -->
  <div class="jumbotron" style="background-color:#EEFFFF; color:#0099CC; min-height:250px; padding:10px; margin-bottom:0px;">
    <div class="col-sm-6">
      <h1> <b>Copter Central</b> </h1>
      <h2>
	<p>
	  This is your premiere location to purchase multi-rotor, remote controlled copters along with their best quality accessories and replacement parts!
       </p>
       <p style="font-weight:bold;">
	  Are you looking for <button class="btn btn-default"><a src="searchlist.php"><b> Copters </b></a></button> or <button class="btn btn-default"> <a src="searchlist.php"><b> Parts</b></a> </button>?
       </p>
      </h2>
    </div>
    <div class="col-sm-6" style="margin-bottom: 130px;">
      <img id="sash" src="res/phantom.png" style="width:550px;height:auto;position:absolute;"> </img>
    </div>
  </div>

  <div class="cols-sm-12 well">
    <h2>Highest Rated Items</h2>
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
        echo '<div class="col-sm-4" style="margin:0px;padding:5px;"> <div class="well" style="min-height:400px;">';
          echo "<h2>" . $row["name"] . "</h2>";
          echo '<img src="' . $row["img"] . '"> </img>';
          echo "<br>  Rating:" .$row["rating"] . "/5   <br>ID:" . $row["ID"];
          //echo '<form><a href="purchase.php"><button type="submit" class="btn btn-primary" > Logout </button></a>';
	  //echo '<input type="hidden" name="ID" value = "$row[ID]"/></form>';
	  //echo '<input type="hidden" name="date" id="hiddenField" value="HELLO" />';
          //echo '<a href="purchase.php" class="button">Checkout</a>';
		
	  echo '<form action="purchase.php" method="post">';
	  echo '<input type="hidden" name="ID" id="hiddenField" value="' . $row["ID"] . '" />';
	  echo '<input type="submit"></form>';
		
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

