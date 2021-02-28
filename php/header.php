<script type="text/javascript">
  $(document).ready(function(){
    if($('#navno').length==0){
      return;
    }
    var no=$('#navno').val();
    var e=$('ul li')[no];
    e.children[0].classList.add('list-group-item','active');
  });
</script>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">Online Test Generator</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
         <?php
        
          if(empty($_SESSION['user'])): ?>
        <li><a href="select-test.php">Active tests</a></li>
      <?php endif; ?>
       <?php if(!empty($_SESSION['user'])): ?>
<li><a href="show-titles.php">My Tests</a></li>
<?php endif;   ?>

        <li><a href="about.php">About</a></li>  
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php	if(empty($_SESSION['user'])): ?>
        <li id="kak"><a data-toggle="modal" href="#signup" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <?php endif; ?>
        <li id="mak"><a  <?php if(empty($_SESSION['user'])){echo 'data-toggle="modal"  href="#login"';}else{echo 'href="logout.php"';}   ?> ><span class="glyphicon glyphicon-log-in"></span><?php if(empty($_SESSION['user'])){echo ' login';}else{echo ' logout '.$_SESSION['user'];}  ?></a></li>
      </ul>
    </div>
  </div>
</nav>