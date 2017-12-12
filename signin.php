<?php

session_start();//session starts here


if(!isset($_SESSION['workspace'])){ //only users within workspace
   header("Location:workspace.php");
}


if(isset($_SESSION['user_name'])) { // if user in session jump to index page 
   header("Location:callback.php");	

}	
error_reporting(0);
	?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Slack</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!-- getting the bootstrap css file for predefined components  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
		
  <!-- main CSS
        ============================================ -->
        <link rel="stylesheet" href="style.css">
		
  
  </head>
  


<body>

	<div id="banner-sign" class="container">
		<div  class="row">
			<div style="margin-top:200px" class="col-md-6 col-sm-2 col-sm-offset-2 col-md-offset-3">
			<div class="well well-sm">	
	<center>
	
		<?php
	
			include 'connect.php'; // database connection

			if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	
				include 'query.php'; // run through queries
	
				if($r2['user_email']!=$_SESSION['user_email'] || $r2['user_pass']!=$_SESSION['user_pass']) {
	
	
		?>
			
			
			<h2 style="font-weight:bold">Invalid Username and Password!</h2>
			
			
		<?php
	
				}
	
			}

			$conn->close();
		?>
			
			
			<h3 style="font-weight:bold">Sign in to <?php echo $_SESSION['workspace']; ?></h3>
			<h5><?php echo $_SESSION['workspace']; ?>.fitness.com</h5>
	</center>		
	
		<h5 style="font-weight:bold">Enter your email address and password</h5>
					
						<form   method="post" action="signin.php">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="email" type="text" class="form-control" name="user_email" placeholder="Email" required>
							</div>
							
							<br>
							
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="password" type="password" class="form-control" name="user_pass" placeholder="Password" required>
							</div>
							
							<br>
							<div class="g-recaptcha" data-sitekey="6Lc1RzwUAAAAAPG12Vp4x3mASn8R3cn5yHP6WEFz"></div>
							<br>
							<div id="cando" style="font-weight:bold;" ></div>
							<br>
							
							<div class="input-group">
							<button  class="btn btn-md btn-success" onclick="return Validate()"  type="submit" value="submit1" name="submit1">Sign In</button><a style="margin-left:340px; font-weight:bold" href="signup.php">Don't have an account? Sign Up</a>
							</div>
						
						<?php require "init.php";    ?>
						
							
							<a role="button" class="btn btn-info" style="margin-left:410px; font-weight:bold" href="login.php">Login with Github credentials</a>
									
									
										
									
							
						
			
		</div>
			</div>
		</div>
	</div>
	
<script>


	 $("#banner-sign").css("height",$(window).height()); //image resizing according to window height
		
	function Validate() {

if (grecaptcha.getResponse() == ""){
    document.getElementById("cando").innerHTML = "Captcha Needed!";
	return false;
} else {
    document.getElementById("cando").innerHTML = "";
	return true;
}

	}	
	
</script>
	
	
 </body>
</html>	