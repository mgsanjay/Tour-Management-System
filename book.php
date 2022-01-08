<?php
session_start();
include 'conn.php';
$name=$_SESSION['user'];
if(isset($_POST['getbook']))
{
    header('Location:home.php');
}
if(isset($_POST['cancel']))
{
    $user=$_POST['user'];
    $source=$_POST['source'];
    $dest=$_POST['dest'];
    $query="DELETE FROM book WHERE bname='$user' && bsource='$source' && bdest='$dest'";
    mysqli_query($conn, $query);
    header('Location:book.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="book.css">
    <title>Document</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <p class="ltext">Travel <span>Diary</span></p>
    </div>
    <div class="link">
        <form method="post">
        <input type="submit" class="a" name="getbook" value="Home">
        </form>
    </div>
</div>
<?php
include 'conn.php';
    $query = "SELECT * FROM book WHERE bname='$name'";
    $res=mysqli_query($conn, $query);
    $num=mysqli_num_rows($res);
    if($num>0)
    {?>
    <div class="Container">
    <div class="books">
        <div><h2>Name</h2></div>
        <div><h2>Pickup</h2></div>
        <div><h2>Place</h2></div>
        <div><h2>Guide</h2></div>
        <div><h2>Price</h2></div>
        <div><h2>Phone</h2></div>
        <div><h2>Update</h2></div>
        <div><h2>Cancel</h2></div>
    </div>
    <?php
    while($myarr=mysqli_fetch_assoc($res))
    $arr=array();
    $arr[]=$myarr;
        foreach($arr as $myarr):?>
        <div class="values">
        <div><h2><?php echo $myarr['bname'];?></h2></div>
        <div><h2><?php echo $myarr['bsource'];?></h2></div>
        <div><h2><?php echo $myarr['bdest'];?></h2></div>
        <div><h2><?php echo $myarr['bguide'];?></h2></div>
        <div><h2>rs. <?php echo $myarr['bprice'];?></h2></div>
        <div><h2><?php echo $myarr['bphone'];?></h2></div>
        <div>
        <form action="update.php" method="post">
        <input type="hidden" name="upid" value="<?php echo $myarr['bid'];?>">
        <input type="submit" class="greenb" name="update" value="Update">
        </form>
        </div>
        <div>
        <form method="post">
        <input type="hidden" name="user" value="<?php echo $myarr['bname'];?>">
        <input type="hidden" name="source" value="<?php echo $myarr['bsource'];?>">
        <input type="hidden" name="dest" value="<?php echo $myarr['bdest'];?>">
        <input type="submit" class="redb" name="cancel" value="Cancel">
        </form>
        </div>
    </div>
   <?php
    endforeach;?>
</div>
  <?php  }
    else
    {
    ?>
    <h1 style="text-align:center;">There are no Orders</h1>
    <?php
    }
    ?>
<div class="footer">
    <p>Copyright &copy; 2019-20 Travel Diary</p>
</div>
</body>
</html>