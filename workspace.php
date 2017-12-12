<?php
// Start the session
session_start();
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
		<link rel="icon" type="image/jpg" href="https://static8.depositphotos.com/1010751/1032/v/950/depositphotos_10323838-stock-illustration-fitness-logo.jpg">
	
	
  </head>


<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="font-weight:bold; font-family: 'Salsa'; font-size:2.5em; color:orange" class="navbar-brand" href="workspace.php">Fitness</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      
	  
      <li><a role="button" style="color:white" class="btn btn-primary" href="contact.php">Contact Us</a></li>
	  
    </ul>
  </div>
</nav>

	<div id="banner" class="container" >
		<div style="position:absolute;" id="myCarousel" class="carousel slide" data-ride="carousel">
			 <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  
   <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img class="adjust" alt="home" src="image.png">
    </div>

    <div class="item">
      <img class="adjust" alt="home" src="image11.jpg">
    </div>

    <div class="item">
      <img class="adjust" alt="home" src="image12.jpg">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
		</div>
		<div  class="row"> <!-- overlay text -->
			<div class="col-md-4"></div>
			<div  style="margin-top:250px" class="col-md-6"> <!-- centering the form -->
			<div style="text-align:center" class="well well-sm">
			
				<?php


  
					include 'connect.php'; //includes the database connection file
	
					if ($_SERVER["REQUEST_METHOD"] == "POST") // post method used for form submission
					{
						include 'query.php'; //includes the query.php file
						
					    if($r2['workspace']!= $search)
	
						{
		
	
	            ?>
	
				<h4 style=" font-weight:bold" >We couldn’t find your workspace.</h4>
	
				<?php
						}
	
					else
					{
						$_SESSION['workspace'] = $r2['workspace'];
						header("Location: signin.php");
	
	
	
	
					}
	
				$conn->close();

				}
				?>
				
				<h2 style=" font-weight:bold">Sign in to your workspace</h2>
					<p style=" font-weight:bold">Enter your workspace’s Slack URL.</p>
						<form   class="form-horizontal" method="post" action="workspace.php">
						
						<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
							<div class="input-group">
								
									<input id="workspace" type="text"  placeholder="your-workspace-url" name="search" required />
											<label style="padding-left:5px" for="workspace" class="control-label">.fitness.com</label>
							</div>
								<br>
								<div class="row">
									<div class="col-lg-6 col-lg-offset-3">
									<div class="input-group"  >
											<button class="btn btn-success" name="submit" value="submit" type="submit">Continue -></button>
									
									</div>
									</div>
								</div>
						</div>
						</div>
						
						
						</form>
									
									
										
									
							
				
			</div>
		
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	
	 <script>	    	    	
	 
	 $(".adjust").css("height",$(window).height());
	$("#banner").css("max-height",$(window).height());
	$(".adjust").css("width",$(window).width());
	
	$("#banner").css("max-width",$(window).width());
				
    </script>	
	
</body>
</html>