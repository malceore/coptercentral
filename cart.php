<?php

//Gotta load up session
session_start();

// Gotta connect to db.
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

//check if person exists, if so log them in.
//$sql = "SELECT 'ProductID' FROM `orders` WHERE `CustomerID` = '" . $_SESSION["ID"] ."";
//$sql = "SELECT * FROM `orders`LIMIT 0 , 30";
$temp = $_SESSION['ID'];
//echo $temp;
//$sql = "SELECT * FROM `orders` WHERE 'CustomerID'= $temp";
$sql = "SELECT * FROM orders INNER JOIN parts ON orders.ProductID = parts.ID WHERE orders.CustomerID = $temp";// WHERE 'CustomerID'= $temp";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

	echo "Found your orders, check'em out!<br>";
	while($row = $result->fetch_assoc()) {
        	//echo "<br> ". $row["CustomerID"]. " ". $row["ProductID"] . " <br>";
		echo "<br>	ID: " . $row["ProductID"] . "		Name: " . $row["name"];
        }
	echo "<br>";

//If they are new here lets give them a form and replay this.
}else{

	echo "Didn't find any orders for parts, please purchase some sweet copters and parts NOW! <br><br>";

}

$sql = "SELECT * FROM orders INNER JOIN copter ON orders.ProductID = copter.ID WHERE orders.CustomerID = $temp";// WHERE 'CustomerID'= $temp";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

        echo "Found your orders, check'em out!<br>";
        while($row = $result->fetch_assoc()) {
                //echo "<br> ". $row["CustomerID"]. " ". $row["ProductID"] . " <br>";
                echo "<br>      ID: " . $row["ProductID"] . "           Name: " . $row["name"];
        }
        echo "<br>";

//If they are new here lets give them a form and replay this.
}else{

        echo "Didn't find any orders for parts, please purchase some sweet copters and parts NOW! <br><br>";

}


echo "<br>Click button to return to main page.";
echo '<form><input type="button" value="Redirect Me" onclick="Redirect();" /></form>';
echo '<script type="text/javascript">function Redirect() {window.location="index.php";}</script>';

$conn->close();
?>
