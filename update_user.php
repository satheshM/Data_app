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
$update_password = $_POST['update_password'];
// $username = "sathesh0012";
// $password = "u got it man";
// $update_password = "new_password"; // Replace with the value from the form

$query = "SELECT * FROM `data` WHERE `username` = '$username'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) {
        if (!empty($update_password)) {
            // Update the password
            $updateQuery = "UPDATE `data` SET `password` = '$update_password' WHERE `username` = '$username'";
            if ($conn->query($updateQuery)) {
                echo "Password updated successfully.";
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "Login success.";
        }
    } else {
        echo "Login failed";
    }
} else {
    echo "Username not found";
}
?>
