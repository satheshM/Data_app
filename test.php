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
?>