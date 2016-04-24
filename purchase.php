<?php
session_start();

if($_SESSION['name'] == NULL){
  echo "Must be logged in to do anything.";

}else{

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

$productID = $_POST["ID"];
//echo $_POST["ID"];
$customerID = $_SESSION["ID"];
//$sql = "INSERT INTO orders (CustomerID, ProductID) VALUES ('$customerID', '$productID')";
$sql = "INSERT INTO `orders`(`CustomerID`, `ProductID`) VALUES ( '$customerID', '$productID')";

if ($conn->query($sql) === TRUE) {
    echo "New order created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
