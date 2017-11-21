<?php

session_start();//session starts here


if(!isset($_SESSION['workspace'])){ //only users within workspace
   header("Location:workspace.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Slack</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
</head>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="font-weight:bold; font-family: 'Salsa'; font-size:2.5em; color:orange" class="navbar-brand" href="index.php">Fitness</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a style="color:red" href="signout.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
    </ul>
  </div>
</nav>
  

<body>

<div style="margin-top: 100px;"class="container">
  <h2>Account Basics</h2>
  
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Upload Profile Picture</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse ">
        <div class="panel-body">For Updating or setting Profile Picture, click on your name on the left side of the screen as shown below.
		<br>
		<img src="help_images/help1.png" class="img-rounded responsive" width="1100" height="500" >
		<br>
		<br>
		Click on Choose file, Select the Image and then click on Upload button as shown below.
		<br>
		<br>
		<br>
		<img src="help_images/help2.png" class="img-rounded responsive" width="1100" height="500" >
		<br>
		<br>
		Done!
		
		</div>
		
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Search for Other Users</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Type in the Text Box at the top with the Name of the User which you want to search for as displayed below.
		<br>
		<img src="help_images/help3.png" class="img-rounded responsive" width="1100" height="500" >
		<br>
		<br>
        Click on the search icon and then you will get to see the desired user's Profile page as displayed.
		<br>
		<img src="help_images/help4.png" class="img-rounded responsive" width="1100" height="500" >
		<br>
		<br>
        Done!
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">To Sign Out of the account</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Click on the red Sign Out button beneath your username on left side of the screen as shown below.
		<br>
		<br>
		<img src="help_images/help5.png" class="img-rounded responsive" width="1100" height="500" >
		<br>
		<br>
		Done!
		</div>
      </div>
    </div>
  </div> 
  
  <br>
  
	 <div class="panel-group" id="accordion1">
	<h2>Posting</h2>
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapse4">Posting Messages</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">Type the message in the big text box at the bottom you want to post and click on the green Post button besides the box. 
		<br>
		<br>
		<img src="help_images/help5.png" class="img-rounded responsive" width="1100" height="500" >
		<br>
		<br>
		Done!
		</div>
      </div>
    </div>
	
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapse5">Posting Image From Local Drive</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Click on the Plus icon at the bottom besides the Post button. A window will pop up as displayed below. 
		<br>
		<br>
		<img src="help_images/help6.png" class="img-rounded responsive" width="1100" height="500" >
		<br>
		<br>
		You can enter description about the image topic or can directly post by clicking on the red upload button as displayed above.
		<br>
		<br>
		
		Done!
		</div>
      </div>
    </div>
	
	</div>
	
</div>




</body>