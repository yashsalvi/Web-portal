<?php
session_start();
if(isset($_POST['submit'])&&isset($_SESSION['fno'])&&$_POST['title']){
	include('conn.php');
	$user=$_SESSION['user'];
	$title=$_POST['title'];
	$fno=$_SESSION['fno'];
	$add=mysqli_query($con,"insert into gen_forms values('$user','$title',$fno)");
	$update=mysqli_query($con,"update utcet set nform=nform+1 where username='$user' ");

	if($add&&$update)
		header('location:show-titles.php');
}
else
{
	echo '<script>alert("some error occured");window.location.href="create-test.php"</script>';
}

?>