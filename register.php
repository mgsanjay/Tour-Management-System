<?php
session_start();
include 'conn.php';
if(isset($_POST['register'])&&isset($_POST['uname'])&&isset($_POST['pass'])&&isset($_POST['email'])&&isset($_POST['phone']))
{
    $name=$_POST['uname'];
    $pwd=$_POST['pass'];
    $ema=$_POST['email'];
    $ph=$_POST['phone'];
    $query = "INSERT INTO user(uname,upass,uemail,uphone) 
  			  VALUES('$name','$pwd','$ema', '$ph')";
      mysqli_query($conn, $query);
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="register.css">
</head>
<body>
<div>
<form method="post">
<h1>Register</h1>
<input type="text" name="uname" placeholder="Username" required>
<input type="Password" name="pass" placeholder="Password" required>
<input type="email" name="email" placeholder="Email" required>
<input type="text" name="phone" placeholder="Phone" required>
<input type="submit" name="register" value="Register">
</form>
</div>
</body>
</html>