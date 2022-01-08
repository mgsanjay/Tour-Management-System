<?php
session_start();
include 'conn.php';
$loc=$_SESSION['location'];
if(isset($_POST['home']))
{
    header('Location:home.php');
}
if(isset($_POST['book']))
{
    $name=$_SESSION['user'];
    $phone=$_SESSION['phone'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $guide=$_POST['guide'];
    $price=$_POST['price'];
    $queryp = "INSERT INTO book(bname,bsource,bdest,bguide,bprice,bphone) 
  			  VALUES('$name','$from','$to', '$guide','$price','$phone')";
    mysqli_query($conn, $queryp);
    header('Location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="place.css">
    <title>Document</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <p class="ltext">Travel <span>Diary</span></p>
    </div>
    <div class="link">
        <form method="post">
        <input type="submit" name="home" value="Home">
        </form>
    </div>
</div>
<div class="container">
<?php
    include 'conn.php';
    $query = "SELECT * FROM place WHERE psource='$loc'";
    $res=mysqli_query($conn, $query);
    while($myarr=mysqli_fetch_assoc($res))
    $arr=array();
    $arr[]=$myarr;
	foreach($arr as $myarr):?>
        <div class="cont">
        <img src="<?php echo $myarr['pimg'];?>">
        <h1><?php echo $myarr['pdest'];?></h1>
        <p>Guide: <?php echo $myarr['pguide'];?></p>
        <p>Price: Rs. <?php echo $myarr['pprice'];?></p>
        <form method="post">
        <input type="hidden" name="from" value="<?php echo $myarr['psource'];?>">
        <input type="hidden" name="to" value="<?php echo $myarr['pdest'];?>">
        <input type="hidden" name="guide" value="<?php echo $myarr['pguide'];?>">
        <input type="hidden" name="price" value="<?php echo $myarr['pprice'];?>">
        <input type="submit" name="book" value="Book Now">
        </form>
        </div>
   <?php
    endforeach;
    ?>
</div>
<div class="footer">
    <p>Copyright &copy; 2019-20 Travel Diary</p>
</div>
</body>
</html>