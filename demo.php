<?php
session_start();
include 'conn.php';
$id=$_POST['id'];
$phone=$_POST['phone'];
$query="UPDATE book SET bphone='$phone' WHERE bid='$id'";
mysqli_query($conn, $query);
header('Location:book.php');
?>