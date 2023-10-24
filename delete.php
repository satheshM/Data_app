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
    echo "Connected successfully";
}

// These should come from the form, not hardcoded
$username = $_POST['Username'];
$password = $_POST['password'];

// $username = "sathesh0012";
// $password = "u got it man";

$query = "SELECT * FROM `data` WHERE `username` = '$username'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) {
        // Password matches, so delete the user
        $deleteQuery = "DELETE FROM `data` WHERE `username` = '$username'";
        if ($conn->query($deleteQuery)) {
            echo "Login success, user deleted.";
        } else {
            echo "Error deleting user: " . $conn->error;
        }
    } else {
        echo "Login failed";
    }
} else {
    echo "Username not found";
}
?>
