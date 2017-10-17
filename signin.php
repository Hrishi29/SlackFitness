<?php

session_start();//session starts here


if(!isset($_SESSION['workspace'])){
   header("Location:workspace.php");
}


if(isset($_SESSION['user_name'])) {
   header("Location:index.php");	

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

  <style>
	#bannerimage {
  width: 100%;
  background-image: url(image1.png);
  height: 700px;
  background-repeat: no-repeat;
  background-position: center;
  -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  
}
	
	
	
	</style>
  </head>
  


<body>
<div id="bannerimage">
	<div class="container">
		<div class="row">
			<div style="margin-top:150px" class="col-md-4 col-sm-4 col-md-offset-4">
				
	<center>
			<h3 style="font-weight:bold">Sign in to <?php echo $_SESSION['workspace']; ?></h3>
			<h5><?php echo $_SESSION['workspace']; ?>.fitness.com</h5>
	</center>		
	
		<h5 style="font-weight:bold">Enter your email address and password</h5>
					
						<form   method="post" action="login.php">
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
							<div class="input-group">
							<button  class="btn btn-md btn-success"  type="submit" value="submit" name="submit">Sign In</button>
							</div>
						</form>
									
									
										
									
							
						
			
		
			</div>
		</div>
	</div>



	
</div>	
 </body>
</html>	