<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12656718";
$password = "8QREizYG8Z";
$dbname = "sql12656718";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connected successfully";

    
}
$username = $_POST['Username'];
$password = $_POST['password'];
// $username = "sathesh0012";
// $password = "u got it man";

$query = "INSERT INTO data(username,password) VALUES ('$username','$password')";
try{

    if(mysqli_query($conn,$query))
    { ?>
        
        <h1> Added successfully</h1>
    <p class="lead"> Go<a href="/Data_app/Data_app/index.html">back!</a>,</p>
    <?php 
    }
    else{
        ?>
    
        <h1>something went wrong</h1>
    
        <?php
    }

}
catch(exception)
{
    printf("username not available ");
}

?> 

