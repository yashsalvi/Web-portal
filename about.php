<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    	p{
    		color:white;
    	}
    </style>
</head>
<body>
<?php
include('conn.php');

include('login.php');
include('signup.php');
include('header.php');


?>
<p><strong>Online Test Generator is a simple test generating application created by Rohit Nair,Tushar Mhalsekar,Santosh Maurya,undergrads at St.Francis Institute of Technology in Mumbai.</strong></p>
<input type="hidden" id="navno" value="2" />
</body>
</html>