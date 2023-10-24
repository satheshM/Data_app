<?php
$servername = "mysql.selfmade.ninja:3306";
$username = "user1";
$password = "PraveenSamboo9629";
$dbname = "user1_app_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
   // echo "Connected successfully";
}

// These should come from the form, not hardcoded
$username = $_POST['Username'];
$password = $_POST['password'];

// $username = "sathesh";
// $password = "Pass@123";

$query = "SELECT * FROM `data` WHERE `username` = '$username'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) {
        echo "Login success";
    } else {
        echo "Login failed";
    }
} else {
    echo "Username not found";
}
?>
