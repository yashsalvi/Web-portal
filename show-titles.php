<?php session_start();   ?>
<!DOCTYPE html>
<html>
<head>
  <title>lol</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/titles.css">
</head>
<body>
<?php
include('conn.php');

include('login.php');
include('signup.php');
include('header.php');

?>
<div class="container">
<?php
$user=$_SESSION['user'];
$forms=mysqli_query($con,"select title,fnumber from gen_forms where username='$user' ");
while($row=mysqli_fetch_array($forms)){
	echo "<div class='titles'><a href='load-preview.php?formn=".$row['fnumber']."'>".$row['title']."</a></div>";
   
}

//echo "<div class='titles'><a href='load-preview.php?formn=1'>Demo page title</a><div>";
?>

  </div>
  <input type="hidden" id="navno" value="1" />
</body>
</html>