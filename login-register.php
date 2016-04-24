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

// Our post Data
//$ = mysql_real_escape_string($unsafe_variable);
//$pwd = mysql_real_escape_string($_POST["password"]);
//$eml = mysql_real_escape_string($_POST["email"]);

$pwd = $_POST["password"];
$eml = $_POST["email"];


// In values in have a not null name then this is an insert request.
if($_POST["name"] != NULL){

	$nm = $_POST["name"];
	$st = $_POST["street"];
	$cd = $_POST["card"];
	$cy = $_POST["city"];
	$zp = $_POST["zip"];
	$st = $_POST["state"];

	$sql = "INSERT INTO `customer`(`Person ID`, `Email`, `Shipping Address`, `Billing Address`, `Credit Card Type`, `Address ID`, `City`, `State`, `Zip`, `Credit Card Type ID`, `Name`, `Password`) VALUES ('', '$eml', '', '', '', '$cd', '', '$cy', '$st', '', '$nm', '$pwd')";
	if ($conn->query($sql) === TRUE) {

	    echo "New record created successfully! <br>";
	    //$_SESSION['name'] = $eml;
	    echo "You have been logged in! Click button to return.";
	    echo '<form><input type="button" value="Redirect Me" onclick="Redirect();" /></form>';
	    echo '<script type="text/javascript">function Redirect() {window.location="index.php";}</script>';
            $_SESSION['name'] = $nm;

	} else {

	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

//check if person exists, if so log them in.
$sql = "SELECT * FROM `customer` WHERE `Email` = '" . $eml ."' AND 'Password'=" . $pwd . "";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


	echo "Found you, welcome back, ";
        while($row = $result->fetch_assoc()) {
                //echo "<br> ". $row["CustomerID"]. " ". $row["ProductID"] . " <br>";
		$_SESSION["name"] = $row["Name"];
		$_SESSION["email"] = $row["Email"];
		$_SESSION["ID"] = $row["Person ID"];
		echo $_SESSION["name"] . "!<br>";
	}

	echo "You have been logged in! Click button to return.";
	echo '<form><input type="button" value="Redirect Me" onclick="Redirect();" /></form>';
	echo '<script type="text/javascript">function Redirect() {window.location="index.php";}</script>';

//If they are new here lets give them a form and replay this.
}else{

	echo "Didn't find you, please sign up! <br><br>";

	echo '<form action="login-register.php" method="post">';

	echo 'Name: <input type="text" name="name"><br>';
	echo 'E-mail: <input type="text" name="email" value="' .$eml . '"><br>';
        echo 'Password: <input type="text" name="password" value="'. $pwd .'" mask="*"><br>';
        echo 'City: <input type="text" name="city"><br>';
        echo 'State: <input type="text" name="state"><br>';
        echo 'Zip Code: <input type="text" name="zip"><br>';
        echo 'Credit Card <input type="text" name="card"><br>';

	echo '<input type="submit">';
	echo '</form>';
}





// add to database
//$pwd = $_POST["password"];
//$eml = $_POST["email"];
/*$sql = "SELECT * FROM `copter` ORDER BY `copter`.`rating` DESC LIMIT 0 , 6";
//$sql = "SELECT * FROM parts ORDER BY 'parts' . 'rating' ASC";
$result = $conn->query($sql);
*/
//if ($result->num_rows > 0) {
  //echo "hello"
//}
//If user already exists. retrieve their info
//$sql = "SELECT * FROM 'customer' WHERE 'Email'=$eml";
//$sql = "SELECT * FROM `customer` WHERE `Email` = 'bob@gmail.com'";
//$result = $conn->query($sql);
//$sql = "SELECT * FROM parts ORDER BY 'parts' . 'rating' ASC";
//$result = $conn->query($sql);
/*if($result->num_rows > 0){
  echo "found you!"
}else{
  echo "not found";
}*/
/*if ($result != NULL) {
  $errorMessage= "logged on ";
}
else {
  $errorMessage= "Invalid Logon";
}*/
//echo "Potato!";
// . . .else just insert a new value.
/*$sql = "INSERT INTO customers (name, ID, password, street, card, email, ID2) VALUES ('', '', '$pwd', '', '', '$eml', '')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $_SESSION['name'] = $eml;
    $_SESSION['ID'] = "12345";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "You have been logged in! Click button to return.";
echo '<form><input type="button" value="Redirect Me" onclick="Redirect();" /></form>';
echo '<script type="text/javascript">function Redirect() {window.location="index.php";}</script>';
*/
$conn->close();
?>
