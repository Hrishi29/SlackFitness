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
	
	<style>
	#bannerimage {
  width: 100%;
  background-image: url(image.png);
  height: 700px;
  background-repeat: no-repeat;
  background-position: center;
  -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  
}
	
	.well{
		border: 1px solid black;
background-color: rgba(255,255,255,0.6); 
}
	
	</style>
  </head>


<body>
<div id="bannerimage">
	<div class="container" >
	
		<div class="row">
			<div  style="margin-top:200px" class="col-md-6 col-sm-4 col-md-offset-3">
			<div class="well well-sm">
			<center>
				<?php




if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
	
	$search = $_POST["search"];
	
  $search = trim($search);
  $search = stripslashes($search);
  $search = htmlspecialchars($search);
  
  
  
	$conn = mysqli_connect("localhost","root","");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     } 
	
	mysqli_select_db($conn,'slack');
	
	$r1=mysqli_query($conn,"select workspace from users where workspace='".$search."'");
    $r2=mysqli_fetch_array($r1);
	
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
						<form  class="form-horizontal" method="post" action="workspace.php">
							<div class="input-group">
								
									<input id="workspace" type="text"  placeholder="your-workspace-url" name="search" required />
											<label style="padding-left:5px" for="workspace" class="control-label">.fitness.com</label>
							</div>
								<br>
								<div class="row">
									<div class="col-md-11 col-sm-6">
									<div class="input-group"  >
											<button class="btn btn-success" name="submit" value="submit" type="submit">Continue -></button>
									
									</div>
									</div>
								</div>
						</form>
									
									
										
									
							
			</center>			
			</div>
		
			</div>
		</div>
	</div>
	</div>
</body>
</html>