
<?php
session_start();
include("conn.php");


if(!empty($_GET['formn'])){
  $user=$_SESSION['user'];
    $_SESSION['fno']=$_GET['formn'];
$result=mysqli_query($con,"select question,options,coption,qno from forms where  username='$user' and fnumber='".$_SESSION['fno']."' order by qno");
if(mysqli_num_rows($result)>0){
	echo '<!DOCTYPE html>
<html>
<head>
  <title>lol</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>';
include('login.php');
include('signup.php');
include('header.php');
echo '<div  class="container">
<span id="saved"></span>
<div id="main" >';

while($row=mysqli_fetch_array($result)){
echo '<div class="alert list" id="'.$row['qno'].'">
<a href="#" onclick="return removeOptions(this);" style="float: right;">X</a>
<br/><p>'.$row['question'].'<button class="right-btn" id="update">Edit</button></p>';
$options=explode("`",$row['options']);
for($i=0;$i<sizeof($options);$i++){
	if($i===intval($row['coption']))
echo '<input type="radio" name="anslist'.$row['qno'].'" checked="checked" />';
else
echo '<input type="radio" name="anslist'.$row['qno'].'" disabled/>';
echo '<span>'.$options[$i].'</span>
<br/>';
}
echo '</div>';
}
echo '</div>
<div>
<button id="add" class="btn btn-default btn-lg" data-toggle="modal" >Add More Question</button>
</div>



<div class="modal fade" id="myModal" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Enter Question Details</h4>
        </div>
        <div class="modal-body">
          
          <form id="form1">
<div id="box">
  <textarea class="form-control" rows="3"  style="resize:none;" id="question" required></textarea><br/>
  <p id="choose-ans"><strong>Please select the correct answer</strong></p>
  <div id="options">
  
  </div>
  <input type="submit" value="Add Question" id="add-elem" class="btn btn-success btns" />
  <button class="btn btn-danger btns" id="cancel" data-dismiss="modal">Cancel</button>
</div>
</form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      </div>
      </div>
</div>


</body>
</html>';
}
else
{
  header('location:show-titles.php');
}
//unset($_SESSION['fno']);
}
else if(!empty($_SESSION['fno'])){
   $user=$_SESSION['user'];
	$result=mysqli_query($con,"select question,options,coption,qno from forms where  username='$user' and fnumber='".$_SESSION['fno']."' order by qno");
       if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
echo '<div class="alert list" id="'.$row['qno'].'">
<a href="#" onclick="return removeOptions(this);" style="float: right;">X</a>
<br/><p>'.$row['question'].'<button class="right-btn" id="update">Edit</button></p>';
$options=explode("`",$row['options']);
for($i=0;$i<sizeof($options);$i++){
	if($i===intval($row['coption']))
echo '<input type="radio" name="anslist'.$row['qno'].'" checked="checked" />';
else
echo '<input type="radio" name="anslist'.$row['qno'].'" disabled />';
echo '<span>'.$options[$i].'</span>
<br/>';
}
echo '</div>';
}
}

}

mysqli_close($con);
?>
