<!DOCTYPE html>
<html>
<head>
<title>Update</title>
<link rel="stylesheet" href="update.css">
</head>
<body>
<div class="header">
    <div class="logo">
        <p class="ltext">Travel <span>Diary</span></p>
    </div>
</div>
<div class="upda">
<form method="post" action="demo.php">
<h1>Update</h1>
<input type="hidden" name="id" value="<?php echo $_POST['upid'];?>">
<input type="text" name="phone" placeholder="Enter the phone">
<input type="submit" name="updater" value="Update">
</form>
</div>
<div class="footer">
    <div><p class="pfoot">Copyright &copy; 2019-20 Travel Diary</p></div>
</div>
</body>
</html>