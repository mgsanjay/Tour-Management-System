<?php 
session_start();
$name=$_SESSION['user'];
if(isset($_POST['booking']))
{
    $loc=$_POST['place'];
    $_SESSION['location']=$loc;
    header('Location:place.php');
}
if(isset($_POST['getbook']))
{
    header('Location:book.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="home.css">
</head>
<body>
<div class="header">
    <div class="logo">
        <p class="ltext">Travel <span>Diary</span></p>
    </div>
    <div class="link">
        <form method="post">
        <input type="submit" name="getbook" value="Bookings">
        </form>
    </div>
</div>
<div class="intro">
    <div class="texts">
        <h1>Travel</h1>
        <p class="itext">Tourism is travel for leisure, recreational and business purpose. 
        Tourists can be defined as people who travel to and stay in places outside their usual surroundings
         for more than twenty-four hours and not more than one consecutive year for leisure, business and
          other purposes by the World Tourism Organization. Tourism is a known affair in human life.
           It has been an industry of vast dimensions and eventually supports economic and social growth.
        </p>
        <a href="https://en.wikipedia.org/wiki/Travel">Know More</a>
    </div>
    <div class="image">
        <img src="travel.png">
    </div>
</div>
<div class="qoute">
    <p class="qu">
    <q>Travel isn’t always pretty. It isn’t always comfortable. Sometimes it hurts,
     it even breaks your heart. But that’s okay. The journey changes you; it should change you.
      It leaves marks on your memory, on your consciousness, on your heart,
     and on your body. You take something with you. Hopefully, you leave something good behind.
     </q>
     </p>
     <p class="author">-Anthony Bourdain</p>
</div>
<div class="book">
    <h2>Book Now</h2>
    <h3>Select Your Location</h3>
    <div class=location>
        <form method="post">
        <select name="place" class="selectb">
        <option name="place" disabled selected>Choose Location</option>
        <option name="place" value="manglore">Manglore</option>
        <option name="place" value="udupi">Udupi</option>
        </select>
        <input type="submit" name="booking" value="Search">
        </form>
    </div>
</div>
<div class="footer">

    <div><p class="pfoot">Copyright &copy; 2019-20 Travel Diary</p></div>
    <div><a href="index.php" class="redb">Log Out</a></div>
</div>
</body>
</html>
