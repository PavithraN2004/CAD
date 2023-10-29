<?php
$servername="localhost";
$db="Apply";
$username="root";
$password="";
$connection = mysqli_connect($servername, $username, $password, $db); // Establishing Connection with Server
if(!$connection)
{
        die("Database connection failed: " . mysqli_connect_error());
   
}
else
{ echo "connection established";
}
echo "<br>";

$db = mysqli_select_db($connection, $db); // Selecting Database from Server
  if (!$db) {
        die("Database selection failed: " . mysqli_connect_error());
    }
	else
{ echo "database established";
echo "<br>";

}
$sql = "CREATE TABLE Information (
name VARCHAR(50) PRIMARY key,
email VARCHAR(50),
feedback VARCHAR(100),
)";

$name =" ";
$email = " ";
$query = " ";
$name = $_POST['name'];
$email = $_POST['mail'];
$query= $_POST['qry'];

if ($conn->query($sql) === TRUE) {
    echo "created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>