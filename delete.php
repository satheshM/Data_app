<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12656718";
$password = "8QREizYG8Z";
$dbname = "sql12656718";


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
