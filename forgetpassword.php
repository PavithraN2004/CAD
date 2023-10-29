<?php

$uname = $_POST['uname'];
$email  = $_POST['email'];
$pwd = $_POST['pwd'];





if (!empty($uname)  || !empty($email) || !empty($pwd) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From forgotpwd Where email = ? ";
  $INSERT = "INSERT Into forgotpwd (uname,email,pwd  )values(?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $uname,$email,$pwd);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>