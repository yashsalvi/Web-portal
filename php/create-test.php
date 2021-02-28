<?php
session_start();
include('conn.php');
$user=$_SESSION['user'];
$result=mysqli_query($con,"select nform from utcet where username='$user'");
$row=mysqli_fetch_array($result);
$_SESSION['fno']=intval($row['nform'])+1;

?>
<!DOCTYPE html>
<html>
<head>
  <title>lol</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <script type="text/javascript" src="js/main.js"></script>
</head>
<body onload="loadQuestions();">
<?php
include('login.php');
include('signup.php');
include('header.php');


?>
<div  class="container">
<span id="saved"></span>
<div id="main" >

</div>
<form action="gen-form.php" method="post">
<input type="text" name="title" id="ttl" required palceholder="enter title" />
<button id="add" class="btn btn-default btn-lg" data-toggle="modal" >Add More Question</button>
<input type="submit" name="submit" value="generate form" class="btn btn-default btn-lg"  onclick="showTitleBox()"/>
</form>



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
</html>