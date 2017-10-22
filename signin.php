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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
  <!-- main CSS
        ============================================ -->
        <link rel="stylesheet" href="style.css">
		
  
  </head>
  


<body>

	<div id="banner-sign" class="container">
		<div  class="row">
			<div style="margin-top:150px" class="col-md-4 col-sm-4 col-md-offset-4">
				
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
							<div class="input-group">
							<button  class="btn btn-md btn-success"  type="submit1" value="submit1" name="submit1">Sign In</button>
							</div>
						</form>
									
									
										
									
							
						
			
		
			</div>
		</div>
	</div>
	
<script>


	 $("#banner-sign").css("height",$(window).height()); //image resizing according to window height
	

</script>
	
	
 </body>
</html>	