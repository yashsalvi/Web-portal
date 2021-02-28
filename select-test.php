<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/select-test.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/getTests.js"></script>
  </head>
  <body onpageshow="reset();">
    <?php
    include('conn.php');
    

    if(!empty($_SESSION['exam_over'])){
    unset($_SESSION['exam_over']);
    unset($_SESSION['selected-ans']);
  }
    include('login.php');
    include('signup.php');
    include('header.php');


    ?>
    <?php
    $tests=mysqli_query($con,"select username from utcet");

    ?>

    <div id="pick-test">
      <form method="get" action="give-test.php">
        <div class="form-group col-md-2">
        <label for="join">joining Year</label>
        <select required id="join" class="form-control" name="join">
          <option disabled selected value="0">Choose...</option>
          <?php for ($i=2001; $i <=date("Y") ; $i++) {
            echo "<option value=".$i.">".$i."</option>";
          } ?>
        </select>
        </div>
        <div class="form-group col-md-3">
        <label for="department">Department</label>
        <select required id="department" class="form-control" name="department">
          <option disabled selected value="0">Choose...</option>
          <option value="cmpn">CMPN</option>
          <option value="it">IT</option>
          <option value="etrx">ETRX</option>
          <option value="extc">EXTC</option>
        </select>
        </div>
        <div class="form-group col-md-2">
        <label for="divison">Divison</label>
        <select required id="divison" class="form-control" name="divison">
          <option disabled selected value="0">Choose...</option>
          <option value="a">A</option>
          <option value="b">B</option>
        </select>
        </div>
        <div class="form-group col-md-2">
        <label for="roll_no">Roll no.</label>
        <select required id="roll_no" class="form-control" name="roll_no">
          <option disabled selected value="0">Choose...</option>
          <?php
          for ($i=1; $i < 91; $i++) {
          echo  "<option value=".$i.">".$i."</option>";
          }
          ?>
        </select>
        </div>
        <div class="form-group col-md-2">
        <label for="pass">Passing year</label>
        <select required id="pass" class="form-control" name="pass" >
          <option disabled selected value="0">Choose...</option>
          <?php for ($i=2004; $i <=date("Y")+4 ; $i++) {
            echo "<option value=".$i.">".$i."</option>";
          } ?>
        </select>
        </div>
      <div class="form-group">
      <label>Select professor:</label>
      <select required class="form-control" name='professor' onchange="getTests(this.value)" id="select-professor">
      <option disabled selected value="0">Select a Professor</option>
      <?php
      while($row = mysqli_fetch_assoc($tests))
      echo "<option  value=".$row['username'].">".$row['username']."</option>"
      ?>

      </select>

      <label>Select test:</label>
      <select required class="form-control" name='test' id="list-test"><!--test is form no. of that professor -->

      </select>
    </div>
      <button type="submit" class="btn btns">Give Test</button>
      </form>


    </div>
    <input type="hidden" id="navno" value="1" />
  </body>
</html>
