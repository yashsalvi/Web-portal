<?php
session_start();
if(!empty($_GET['prof'])&&!empty($_GET['test'])){
include("conn.php");
$query = 'select qno,coption from forms where username="'.$_GET["prof"].'" AND fnumber='.$_GET['test'];

$correct_options = mysqli_query($con,$query);

$uid1= $_SESSION['uid1'];
$correct=array();
$professor=$_GET["prof"];
$data="";
$score=0;
while($row = mysqli_fetch_assoc($correct_options))
    {
      $correct['q'.$row['qno']] = $row['coption'];
    }
    $i=0;
foreach($_SESSION['selected-ans'] as $x =>$x_value)
{  $i++;
    if($correct[$x] == $_SESSION['selected-ans'][$x])
      {
        $score++;
        
        $data =$data.$i.";";
      }
    
  }
if(substr($data,-1)==";"){
  $data=substr($data,0,strlen($data)-1);
}





$into_database = 'insert into marks (uid,professor,fnumber,details,score,number_of_question) values("'.$uid1.'","'.$_GET['prof'].'",'.$_GET['test'].',"'.$data.'",'.$score.','.sizeof($correct).')';
mysqli_query($con,$into_database);


unset($_SESSION['selected-ans']);
$_SESSION['exam_over']=1;

header('location:report.php?uid='.$uid1.'&prof='.$_GET['prof'].'&test='.$_GET['test']);}
else{
    unset($_SESSION['selected-ans']);
    header('location:select-test.php');
}
?>
