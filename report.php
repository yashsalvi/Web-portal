
<html>
<head>
  <title>Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css" rel="stylesheet">
  	#kak {display: none;}
  	#mak {display: none;}
</style>
</head>
<body>
    <?php
    include('header.php');
    ?>
  <div class="container">
  <?php
  include('conn.php');
  $test=mysqli_query($con,"select question from forms where username='".$_GET['prof']."' and fnumber=".$_GET['test']."");
  $marksdb=mysqli_query($con,"select * from marks where uid='".$_GET['uid']."' and professor='".$_GET['prof']."' and fnumber=".$_GET['test']."");
  ?>
  <table class="table table-bordered">
    <tr>
      <td colspan="2"><p>Professor Name: <?php echo $_GET['prof']; ?></p></td>
    </tr>
    <tr>
      <td colspan="2"><p>Test Name: <?php $t=mysqli_fetch_assoc($test); echo $t['question']."<br />";?></p></td>
    </tr>
  </table>
  <br /><br />
  <p>UID <?php echo strtoupper($_GET['uid']);  ?></p>
  <table class="table table-bordered">

    <?php

    $row=mysqli_fetch_array($marksdb);
     $coption=explode(";",$row['details']);
     //echo sizeof($coption);
    for($i=1;$i<=intval($row['number_of_question']);$i++){
      if (array_search($i,$coption)!==false) {
        echo "<tr><td>Question ".$i."</td><td><span class='glyphicon glyphicon-ok'></span></td></tr>";
      }
      else {
        echo "<tr><td>Question ".$i."</td><td><span class='glyphicon glyphicon-remove'></span></td></tr>";
      }
    }
    ?>
  </table>

  <table class="table table-bordered">
    <tr>
      <td>
        Correct Answer's : <?php echo $row['score']; ?>
      </td>
    </tr>
    <tr>
      <td>
        Wrong Answer's : <?php echo intval($row['number_of_question'])-sizeof($coption); ?>
      </td>
    </tr>
    <tr>
      <td>
        Total marks : <?php echo $row['score']; ?>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
