<?php
session_start();//session starts here




if(!isset($_SESSION['user_name'])) {
   header("Location:signin.php");	

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

	<div id="banner-sign1" class="container">
		<div  class="row">
			<div style="margin-top:200px" class="col-md-6 col-sm-2 col-sm-offset-2 col-md-offset-3">
			<div class="well well-sm">	
	<center>
	<?php 
	include 'connect.php'; // database connection

			if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	
				include 'query.php'; // run through queries
			}
	?>
	<p>Enter the Authorization Code Sent to <?php echo ""; echo $_SESSION['user_email'];?>  </p>
	
	<form   method="post" action="mail.php">
							<div class="input-group">
								
									<input type="text" class="form-control" name="mail_code" placeholder="Enter Code" required>
							</div>
							
							<div class="input-group">
							<button  class="btn btn-md btn-success"  type="submit" name="submit_code">Authorize</button>
							</div>
						
						
	</form>
	
	</center>
			</div>
			</div>
		</div>
    </div>		

</body>	

</html>

<script>


	 $("#banner-sign1").css("height",$(window).height()); //image resizing according to window height
</script>

